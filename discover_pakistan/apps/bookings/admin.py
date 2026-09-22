from django.contrib import admin
from .models import Booking


@admin.register(Booking)
class BookingAdmin(admin.ModelAdmin):
    list_display = ('booking_id', 'customer_name', 'package', 'hotel', 'departure_date', 'total_price', 'status', 'created_at')
    list_filter = ('status', 'departure_date', 'created_at')
    search_fields = ('booking_id', 'customer_name', 'customer_email', 'customer_phone')
    ordering = ('-created_at',)
