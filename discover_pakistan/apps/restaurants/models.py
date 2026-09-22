from django.db import models
from apps.destinations.models import Destination


class Restaurant(models.Model):
    name = models.CharField(max_length=200)
    destination = models.ForeignKey(Destination, on_delete=models.CASCADE, related_name='restaurants')
    cuisine = models.CharField(max_length=100)
    description = models.TextField()
    rating = models.DecimalField(max_digits=3, decimal_places=2, default=4.6)
    image = models.ImageField(upload_to='restaurants/', blank=True, null=True)

    def __str__(self):
        return self.name
