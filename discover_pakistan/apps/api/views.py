from rest_framework import viewsets, filters
from rest_framework.permissions import IsAuthenticated, IsAuthenticatedOrReadOnly
from django.db.models import Q
from django_filters.rest_framework import DjangoFilterBackend
from apps.destinations.models import Destination, Province
from apps.hotels.models import Hotel
from apps.packages.models import TourPackage
from apps.restaurants.models import Restaurant
from apps.bookings.models import Booking
from apps.reviews.models import Review
from apps.blog.models import BlogPost
from .serializers import (
    DestinationSerializer, ProvinceSerializer, HotelSerializer,
    TourPackageSerializer, RestaurantSerializer, BookingSerializer,
    ReviewSerializer, BlogPostSerializer
)
from .permissions import IsOwnerOrStaff


class DestinationViewSet(viewsets.ReadOnlyModelViewSet):
    queryset = Destination.objects.all()
    serializer_class = DestinationSerializer
    filter_backends = [DjangoFilterBackend, filters.SearchFilter, filters.OrderingFilter]
    filterset_fields = ['province__slug', 'rating']
    search_fields = ['title', 'description', 'history']
    ordering_fields = ['rating', 'title']


class ProvinceViewSet(viewsets.ReadOnlyModelViewSet):
    queryset = Province.objects.all()
    serializer_class = ProvinceSerializer


class HotelViewSet(viewsets.ReadOnlyModelViewSet):
    queryset = Hotel.objects.all()
    serializer_class = HotelSerializer
    filter_backends = [DjangoFilterBackend, filters.SearchFilter, filters.OrderingFilter]
    filterset_fields = ['destination', 'rating']
    search_fields = ['name', 'description']
    ordering_fields = ['price_per_night', 'rating']


class TourPackageViewSet(viewsets.ReadOnlyModelViewSet):
    queryset = TourPackage.objects.all()
    serializer_class = TourPackageSerializer
    filter_backends = [DjangoFilterBackend, filters.SearchFilter, filters.OrderingFilter]
    filterset_fields = ['duration_days']
    search_fields = ['title', 'description']
    ordering_fields = ['price', 'duration_days']


class RestaurantViewSet(viewsets.ReadOnlyModelViewSet):
    queryset = Restaurant.objects.all()
    serializer_class = RestaurantSerializer
    filter_backends = [filters.SearchFilter]
    search_fields = ['name', 'cuisine']


class BookingViewSet(viewsets.ModelViewSet):
    serializer_class = BookingSerializer
    permission_classes = [IsAuthenticated, IsOwnerOrStaff]
    http_method_names = ['get', 'post', 'head', 'options']

    def get_queryset(self):
        if self.request.user.is_staff:
            return Booking.objects.select_related('user', 'package', 'hotel').order_by('-created_at')
        return Booking.objects.filter(user=self.request.user).select_related('package', 'hotel').order_by('-created_at')


class ReviewViewSet(viewsets.ModelViewSet):
    serializer_class = ReviewSerializer
    permission_classes = [IsAuthenticatedOrReadOnly, IsOwnerOrStaff]

    def get_queryset(self):
        queryset = Review.objects.filter(is_approved=True)
        if self.request.user.is_authenticated:
            queryset = queryset.filter(Q(is_approved=True) | Q(user=self.request.user))
        return queryset.order_by('-created_at')


class BlogPostViewSet(viewsets.ReadOnlyModelViewSet):
    queryset = BlogPost.objects.filter(is_published=True)
    serializer_class = BlogPostSerializer
