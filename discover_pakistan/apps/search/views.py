from django.shortcuts import render
from django.db.models import Q
from apps.destinations.models import Destination
from apps.hotels.models import Hotel
from apps.packages.models import TourPackage


def universal_search_view(request):
    query = request.GET.get('q', '').strip()
    destinations = []
    hotels = []
    packages = []

    if query:
        destinations = Destination.objects.filter(
            Q(title__icontains=query) | Q(description__icontains=query) | Q(province__name__icontains=query)
        )
        hotels = Hotel.objects.filter(
            Q(name__icontains=query) | Q(description__icontains=query)
        )
        packages = TourPackage.objects.filter(
            Q(title__icontains=query) | Q(description__icontains=query)
        )

    context = {
        'query': query,
        'destinations': destinations,
        'hotels': hotels,
        'packages': packages,
        'total_results': len(destinations) + len(hotels) + len(packages)
    }
    return render(request, 'search/results.html', context)
