from django.db import models
from apps.accounts.models import User


class Province(models.Model):
    name = models.CharField(max_length=100, unique=True)
    slug = models.SlugField(unique=True)

    class Meta:
        verbose_name_plural = 'Provinces'

    def __str__(self):
        return self.name


class Destination(models.Model):
    title = models.CharField(max_length=200)
    slug = models.SlugField(unique=True)
    province = models.ForeignKey(Province, on_delete=models.CASCADE, related_name='destinations')
    description = models.TextField()
    history = models.TextField(blank=True)
    best_time_to_visit = models.CharField(max_length=150, blank=True)
    rating = models.DecimalField(max_digits=3, decimal_places=2, default=4.8)
    featured_image = models.ImageField(upload_to='destinations/', blank=True, null=True)
    created_by = models.ForeignKey(User, on_delete=models.SET_NULL, null=True, blank=True, related_name='created_destinations')

    class Meta:
        ordering = ['title']

    def __str__(self):
        return self.title
