from django.urls import path, include
from rest_framework.routers import DefaultRouter
from .views import (
    DestinationViewSet, ProvinceViewSet, HotelViewSet,
    TourPackageViewSet, RestaurantViewSet, BookingViewSet,
    ReviewViewSet, BlogPostViewSet
)

router = DefaultRouter()
router.register(r'destinations', DestinationViewSet, basename='destination')
router.register(r'provinces', ProvinceViewSet, basename='province')
router.register(r'hotels', HotelViewSet, basename='hotel')
router.register(r'packages', TourPackageViewSet, basename='package')
router.register(r'restaurants', RestaurantViewSet, basename='restaurant')
router.register(r'bookings', BookingViewSet, basename='booking')
router.register(r'reviews', ReviewViewSet, basename='review')
router.register(r'blog', BlogPostViewSet, basename='blog')

app_name = 'api'

urlpatterns = [
    path('', include(router.urls)),
]
