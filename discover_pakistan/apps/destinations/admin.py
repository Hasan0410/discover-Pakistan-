from django.contrib import admin
from .models import Province, Destination


@admin.register(Province)
class ProvinceAdmin(admin.ModelAdmin):
    list_display = ('name', 'slug')
    search_fields = ('name',)


@admin.register(Destination)
class DestinationAdmin(admin.ModelAdmin):
    list_display = ('title', 'province', 'rating')
    search_fields = ('title', 'description')
    list_filter = ('province',)
