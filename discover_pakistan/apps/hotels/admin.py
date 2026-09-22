from django.contrib import admin
from .models import Hotel


@admin.register(Hotel)
class HotelAdmin(admin.ModelAdmin):
    list_display = ('name', 'destination', 'price_per_night', 'rating')
    search_fields = ('name',)
