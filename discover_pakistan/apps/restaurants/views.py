from django.shortcuts import render, get_object_or_404
from .models import Restaurant


def restaurant_list_view(request):
    restaurants = Restaurant.objects.all()
    return render(request, 'restaurants/list.html', {'restaurants': restaurants})


def restaurant_detail_view(request, pk):
    restaurant = get_object_or_404(Restaurant, pk=pk)
    return render(request, 'restaurants/detail.html', {'restaurant': restaurant})
