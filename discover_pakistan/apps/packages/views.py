from django.shortcuts import render, get_object_or_404
from .models import TourPackage


def package_list_view(request):
    packages = TourPackage.objects.all().order_by('-price')
    return render(request, 'packages/list.html', {'packages': packages})


def package_detail_view(request, slug):
    package = get_object_or_404(TourPackage, slug=slug)
    return render(request, 'packages/detail.html', {'package': package})
