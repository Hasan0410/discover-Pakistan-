import uuid
from decimal import Decimal

from django.contrib.auth.decorators import login_required
from django.db import transaction
from django.shortcuts import render, redirect, get_object_or_404
from django.contrib import messages

from .forms import BookingForm
from .models import Booking


def booking_create_view(request):
    post_data = request.POST.copy()
    if request.method == 'POST':
        legacy_fields = {
            'name': 'customer_name',
            'email': 'customer_email',
            'phone': 'customer_phone',
            'guests': 'travelers_count',
            'item': 'custom_title',
            'requests': 'special_requests',
        }
        for old_name, new_name in legacy_fields.items():
            if old_name in post_data and new_name not in post_data:
                post_data[new_name] = post_data[old_name]
    form = BookingForm(post_data if request.method == 'POST' else None)
    if request.method == 'POST' and form.is_valid():
        with transaction.atomic():
            booking = form.save(commit=False)
            booking.user = request.user if request.user.is_authenticated else None
            booking.booking_id = f"DP-{uuid.uuid4().hex[:10].upper()}"
            booking.total_price = (
                form.cleaned_data['package'].price * booking.travelers_count
                if form.cleaned_data.get('package')
                else Decimal('0.00')
            )
            booking.status = 'pending'
            booking.save()
        messages.success(request, f"Your reservation #{booking.booking_id} has been submitted successfully!")
        return render(request, 'bookings/confirmation.html', {'booking': booking})

    return render(request, 'bookings/create.html', {'form': form})


def booking_detail_view(request, booking_id):
    if not request.user.is_authenticated:
        return redirect('accounts:login')
    booking = get_object_or_404(Booking, booking_id=booking_id)
    if not (request.user.is_staff or booking.user_id == request.user.id):
        from django.core.exceptions import PermissionDenied
        raise PermissionDenied
    return render(request, 'bookings/detail.html', {'booking': booking})
