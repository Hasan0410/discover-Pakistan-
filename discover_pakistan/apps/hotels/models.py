from django.db import models
from apps.destinations.models import Destination


class Hotel(models.Model):
    name = models.CharField(max_length=200)
    destination = models.ForeignKey(Destination, on_delete=models.CASCADE, related_name='hotels')
    description = models.TextField()
    price_per_night = models.DecimalField(max_digits=10, decimal_places=2, default=0)
    rating = models.DecimalField(max_digits=3, decimal_places=2, default=4.5)
    image = models.ImageField(upload_to='hotels/', blank=True, null=True)

    class Meta:
        ordering = ['name']

    def __str__(self):
        return self.name
