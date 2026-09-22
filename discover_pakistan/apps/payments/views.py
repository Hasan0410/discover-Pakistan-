from django.shortcuts import render, get_object_or_404, redirect
from django.contrib.auth.decorators import login_required
from django.contrib import messages
from django.core.exceptions import PermissionDenied
from django.db import transaction
from apps.bookings.models import Booking
from .models import Payment
import uuid


@login_required
def payment_checkout_view(request, booking_id):
    booking = get_object_or_404(Booking, booking_id=booking_id)
    if not (request.user.is_staff or booking.user_id == request.user.id):
        raise PermissionDenied
    if request.method == 'POST':
        method = request.POST.get('method', 'card')
        with transaction.atomic():
            payment = booking.payments.filter(status='pending').first()
            if payment is None:
                payment = Payment.objects.create(
                    booking=booking,
                    transaction_id=f"TXN-{uuid.uuid4().hex[:8].upper()}",
                    amount=booking.total_price,
                    currency='PKR',
                    method=method,
                    status='pending'
                )
        messages.info(request, 'Payment is pending provider verification. No payment gateway is configured yet.')
        return redirect('bookings:detail', booking_id=booking.booking_id)

    return render(request, 'payments/checkout.html', {'booking': booking})
