from django.contrib import admin
from .models import Payment


@admin.register(Payment)
class PaymentAdmin(admin.ModelAdmin):
    list_display = ('transaction_id', 'booking', 'amount', 'currency', 'method', 'status', 'created_at')
    list_filter = ('status', 'method', 'currency', 'created_at')
    search_fields = ('transaction_id', 'booking__booking_id', 'booking__customer_name')
