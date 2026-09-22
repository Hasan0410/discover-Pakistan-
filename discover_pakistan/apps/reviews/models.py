from django.db import models
from django.conf import settings
from apps.destinations.models import Destination
from apps.hotels.models import Hotel
from apps.packages.models import TourPackage


class Review(models.Model):
    user = models.ForeignKey(settings.AUTH_USER_MODEL, on_delete=models.CASCADE, related_name='reviews')
    destination = models.ForeignKey(Destination, on_delete=models.CASCADE, null=True, blank=True, related_name='reviews')
    hotel = models.ForeignKey(Hotel, on_delete=models.CASCADE, null=True, blank=True, related_name='reviews')
    package = models.ForeignKey(TourPackage, on_delete=models.CASCADE, null=True, blank=True, related_name='reviews')
    rating = models.PositiveSmallIntegerField(default=5)
    title = models.CharField(max_length=200)
    comment = models.TextField()
    is_approved = models.BooleanField(default=False)
    created_at = models.DateTimeField(auto_now_add=True)

    class Meta:
        constraints = [
            models.CheckConstraint(condition=models.Q(rating__gte=1, rating__lte=5), name='review_rating_between_one_and_five'),
        ]

    def __str__(self):
        return f"{self.user.username} - {self.title} ({self.rating}★)"
