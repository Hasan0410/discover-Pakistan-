from django.contrib import admin
from .models import TourPackage


@admin.register(TourPackage)
class TourPackageAdmin(admin.ModelAdmin):
    list_display = ('title', 'duration_days', 'price')
    search_fields = ('title', 'description')
