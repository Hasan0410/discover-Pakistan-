from rest_framework import serializers
from apps.destinations.models import Destination, Province
from apps.hotels.models import Hotel
from apps.packages.models import TourPackage
from apps.restaurants.models import Restaurant
from apps.bookings.models import Booking
from apps.reviews.models import Review
from apps.blog.models import BlogPost


class ProvinceSerializer(serializers.ModelSerializer):
    class Meta:
        model = Province
        fields = ('id', 'name', 'slug')


class DestinationSerializer(serializers.ModelSerializer):
    province_name = serializers.ReadOnlyField(source='province.name')

    class Meta:
        model = Destination
        fields = ('id', 'title', 'slug', 'province', 'province_name', 'description', 'history', 'best_time_to_visit', 'rating', 'featured_image')


class HotelSerializer(serializers.ModelSerializer):
    destination_title = serializers.ReadOnlyField(source='destination.title')

    class Meta:
        model = Hotel
        fields = ('id', 'name', 'destination', 'destination_title', 'description', 'price_per_night', 'rating', 'image')


class TourPackageSerializer(serializers.ModelSerializer):
    class Meta:
        model = TourPackage
        fields = ('id', 'title', 'slug', 'duration_days', 'price', 'description', 'destinations', 'featured_image')


class RestaurantSerializer(serializers.ModelSerializer):
    class Meta:
        model = Restaurant
        fields = ('id', 'name', 'destination', 'cuisine', 'description', 'rating', 'image')


class BookingSerializer(serializers.ModelSerializer):
    user = serializers.PrimaryKeyRelatedField(read_only=True)

    class Meta:
        model = Booking
        fields = (
            'id', 'booking_id', 'user', 'customer_name', 'customer_email',
            'customer_phone', 'package', 'hotel', 'custom_title',
            'departure_date', 'travelers_count', 'room_type', 'total_price',
            'status', 'special_requests', 'created_at', 'updated_at',
        )
        read_only_fields = ('id', 'booking_id', 'user', 'total_price', 'status', 'created_at', 'updated_at')

    def validate_travelers_count(self, value):
        if value < 1:
            raise serializers.ValidationError('At least one traveler is required.')
        return value

    def validate_departure_date(self, value):
        from django.utils import timezone
        if value <= timezone.localdate():
            raise serializers.ValidationError('Choose a future departure date.')
        return value

    def validate(self, attrs):
        if not attrs.get('package') and not attrs.get('custom_title'):
            raise serializers.ValidationError('A package or custom title is required.')
        return attrs

    def create(self, validated_data):
        request = self.context['request']
        package = validated_data.get('package')
        travelers_count = validated_data['travelers_count']
        validated_data['user'] = request.user
        validated_data['booking_id'] = self._booking_id()
        validated_data['total_price'] = package.price * travelers_count if package else 0
        return Booking.objects.create(**validated_data)

    @staticmethod
    def _booking_id():
        import uuid
        return f'DP-{uuid.uuid4().hex[:10].upper()}'


class ReviewSerializer(serializers.ModelSerializer):
    username = serializers.ReadOnlyField(source='user.username')

    class Meta:
        model = Review
        fields = ('id', 'user', 'username', 'destination', 'hotel', 'package', 'rating', 'title', 'comment', 'is_approved', 'created_at')
        read_only_fields = ('id', 'user', 'username', 'is_approved', 'created_at')

    def validate_rating(self, value):
        if not 1 <= value <= 5:
            raise serializers.ValidationError('Rating must be between 1 and 5.')
        return value

    def validate(self, attrs):
        if not any(attrs.get(field) for field in ('destination', 'hotel', 'package')):
            raise serializers.ValidationError('A review must reference a destination, hotel, or package.')
        return attrs

    def create(self, validated_data):
        validated_data['user'] = self.context['request'].user
        return Review.objects.create(**validated_data)


class BlogPostSerializer(serializers.ModelSerializer):
    author_name = serializers.ReadOnlyField(source='author.username')
    category_name = serializers.ReadOnlyField(source='category.name')

    class Meta:
        model = BlogPost
        fields = ('id', 'title', 'slug', 'author', 'author_name', 'category', 'category_name', 'cover_image', 'summary', 'content', 'read_time', 'published_at', 'updated_at')
