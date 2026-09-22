from django.shortcuts import render
from .models import GalleryImage


def gallery_list_view(request):
    images = GalleryImage.objects.all().order_by('-is_featured', '-created_at')
    return render(request, 'gallery/list.html', {'images': images})
