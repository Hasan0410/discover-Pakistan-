from django.db import models
from apps.destinations.models import Destination


class GalleryImage(models.Model):
    title = models.CharField(max_length=200)
    caption = models.CharField(max_length=300, blank=True)
    destination = models.ForeignKey(Destination, on_delete=models.CASCADE, related_name='gallery_images', null=True, blank=True)
    image = models.ImageField(upload_to='gallery/')
    is_featured = models.BooleanField(default=False)
    created_at = models.DateTimeField(auto_now_add=True)

    def __str__(self):
        return self.title
