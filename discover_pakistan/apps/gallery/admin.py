from django.contrib import admin
from .models import GalleryImage


@admin.register(GalleryImage)
class GalleryImageAdmin(admin.ModelAdmin):
    list_display = ('title', 'destination', 'is_featured', 'created_at')
    list_filter = ('is_featured', 'created_at')
    search_fields = ('title', 'caption')
