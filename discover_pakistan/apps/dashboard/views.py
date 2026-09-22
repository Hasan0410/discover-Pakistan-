from django.shortcuts import render
from django.contrib.auth.decorators import login_required
from apps.bookings.models import Booking
from apps.destinations.models import Destination
from apps.packages.models import TourPackage


@login_required
def dashboard_home_view(request):
    user_bookings = Booking.objects.filter(user=request.user).order_by('-created_at') if request.user.is_authenticated else []
    total_destinations = Destination.objects.count()
    total_packages = TourPackage.objects.count()

    context = {
        'bookings': user_bookings,
        'total_destinations': total_destinations,
        'total_packages': total_packages,
    }
    return render(request, 'dashboard/index.html', context)
