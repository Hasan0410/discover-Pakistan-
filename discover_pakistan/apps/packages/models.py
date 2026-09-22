from django.db import models
from apps.destinations.models import Destination


class TourPackage(models.Model):
    title = models.CharField(max_length=200)
    slug = models.SlugField(unique=True)
    duration_days = models.PositiveIntegerField(default=5)
    price = models.DecimalField(max_digits=10, decimal_places=2, default=0)
    description = models.TextField()
    destinations = models.ManyToManyField(Destination, related_name='packages')
    featured_image = models.ImageField(upload_to='packages/', blank=True, null=True)

    class Meta:
        ordering = ['title']

    def __str__(self):
        return self.title
