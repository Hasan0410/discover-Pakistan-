from django.shortcuts import render, get_object_or_404
from .models import Hotel


def hotel_list_view(request):
    hotels = Hotel.objects.all().order_by('-rating')
    return render(request, 'hotels/list.html', {'hotels': hotels})


def hotel_detail_view(request, pk):
    hotel = get_object_or_404(Hotel, pk=pk)
    return render(request, 'hotels/detail.html', {'hotel': hotel})
