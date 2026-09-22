from django.db import models
from apps.bookings.models import Booking


class Payment(models.Model):
    PAYMENT_METHOD_CHOICES = (
        ('card', 'Credit / Debit Card (Visa/MasterCard)'),
        ('bank', 'Bank Transfer / SWIFT'),
        ('1link', '1Link / Raast Online'),
        ('cash', 'Concierge Cash on Arrival'),
    )

    STATUS_CHOICES = (
        ('pending', 'Pending Verification'),
        ('successful', 'Successful'),
        ('failed', 'Failed'),
        ('refunded', 'Refunded'),
    )

    booking = models.ForeignKey(Booking, on_delete=models.CASCADE, related_name='payments')
    transaction_id = models.CharField(max_length=100, unique=True)
    amount = models.DecimalField(max_digits=12, decimal_places=2)
    currency = models.CharField(max_length=10, default='PKR')
    method = models.CharField(max_length=30, choices=PAYMENT_METHOD_CHOICES, default='card')
    status = models.CharField(max_length=20, choices=STATUS_CHOICES, default='pending')
    created_at = models.DateTimeField(auto_now_add=True)

    def __str__(self):
        return f"{self.transaction_id} - {self.currency} {self.amount} ({self.status})"
