from django.db import models
from django.conf import settings
from apps.packages.models import TourPackage
from apps.hotels.models import Hotel


class Booking(models.Model):
    STATUS_CHOICES = (
        ('pending', 'Pending Deposit'),
        ('confirmed', 'Confirmed'),
        ('cancelled', 'Cancelled'),
        ('completed', 'Completed'),
    )

    booking_id = models.CharField(max_length=20, unique=True)
    user = models.ForeignKey(settings.AUTH_USER_MODEL, on_delete=models.SET_NULL, null=True, blank=True, related_name='bookings')
    customer_name = models.CharField(max_length=150)
    customer_email = models.EmailField()
    customer_phone = models.CharField(max_length=50)
    package = models.ForeignKey(TourPackage, on_delete=models.SET_NULL, null=True, blank=True, related_name='bookings')
    hotel = models.ForeignKey(Hotel, on_delete=models.SET_NULL, null=True, blank=True, related_name='bookings')
    custom_title = models.CharField(max_length=200, blank=True)
    departure_date = models.DateField()
    travelers_count = models.PositiveIntegerField(default=2)
    room_type = models.CharField(max_length=100, default='deluxe')
    total_price = models.DecimalField(max_digits=12, decimal_places=2, default=0.00)
    status = models.CharField(max_length=20, choices=STATUS_CHOICES, default='pending')
    special_requests = models.TextField(blank=True)
    created_at = models.DateTimeField(auto_now_add=True)
    updated_at = models.DateTimeField(auto_now=True)

    class Meta:
        constraints = [
            models.CheckConstraint(condition=models.Q(travelers_count__gte=1), name='booking_travelers_positive'),
            models.CheckConstraint(condition=models.Q(total_price__gte=0), name='booking_total_non_negative'),
        ]

    def __str__(self):
        return f"{self.booking_id} - {self.customer_name}"
