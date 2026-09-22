from django.test import TestCase, Client
from django.urls import reverse
from django.contrib.auth import get_user_model
from datetime import date, timedelta
from apps.destinations.models import Province, Destination
from apps.hotels.models import Hotel
from apps.packages.models import TourPackage
from apps.bookings.models import Booking
from apps.payments.models import Payment


class DiscoverPakistanTests(TestCase):
    def setUp(self):
        self.client = Client()
        self.province = Province.objects.create(name='Gilgit-Baltistan', slug='gilgit-baltistan')
        self.destination = Destination.objects.create(
            title='Hunza Valley',
            slug='hunza-valley',
            province=self.province,
            description='Alpine paradise with apricot orchards and dramatic peaks.',
            rating=4.90
        )
        self.hotel = Hotel.objects.create(
            name='Serena Hunza',
            destination=self.destination,
            description='Luxury stay',
            price_per_night=34000.00
        )
        self.package = TourPackage.objects.create(
            title='Hunza Expedition',
            slug='hunza-expedition',
            duration_days=8,
            price=175000.00,
            description='Complete tour package'
        )
        self.user = get_user_model().objects.create_user(username='owner', password='StrongPassword123!')
        self.other_user = get_user_model().objects.create_user(username='other', password='StrongPassword123!')

    def test_home_page_status(self):
        response = self.client.get(reverse('core:home'))
        self.assertEqual(response.status_code, 200)
        self.assertContains(response, 'Discover Pakistan')

    def test_customize_tour_page_status(self):
        response = self.client.get(reverse('core:customize-tour'))
        self.assertEqual(response.status_code, 200)
        self.assertContains(response, 'Customize My Tour')

    def test_destinations_list_page(self):
        response = self.client.get(reverse('destinations:list'))
        self.assertEqual(response.status_code, 200)
        self.assertContains(response, 'Hunza Valley')

    def test_destination_detail_page(self):
        response = self.client.get(reverse('destinations:detail', kwargs={'slug': 'hunza-valley'}))
        self.assertEqual(response.status_code, 200)
        self.assertContains(response, 'Hunza Valley')

    def test_hotels_list_page(self):
        response = self.client.get(reverse('hotels:list'))
        self.assertEqual(response.status_code, 200)
        self.assertContains(response, 'Serena Hunza')

    def test_packages_list_page(self):
        response = self.client.get(reverse('packages:list'))
        self.assertEqual(response.status_code, 200)
        self.assertContains(response, 'Hunza Expedition')

    def test_search_view(self):
        response = self.client.get(reverse('search:query') + '?q=Hunza')
        self.assertEqual(response.status_code, 200)
        self.assertContains(response, 'Hunza Valley')

    def test_api_destinations_endpoint(self):
        response = self.client.get('/api/destinations/')
        self.assertEqual(response.status_code, 200)
        self.assertTrue(len(response.json()['results']) >= 1)

    def test_booking_creation_flow(self):
        post_data = {
            'name': 'Ali Raza',
            'email': 'ali@example.com',
            'phone': '+92 300 1112233',
            'departure_date': (date.today() + timedelta(days=30)).isoformat(),
            'guests': '2',
            'item': 'Hunza Expedition',
            'requests': 'VIP airport pickup'
        }
        response = self.client.post(reverse('bookings:create'), post_data)
        self.assertEqual(response.status_code, 200)
        self.assertTrue(Booking.objects.filter(customer_name='Ali Raza').exists())

    def test_booking_create_get_renders(self):
        response = self.client.get(reverse('bookings:create'))
        self.assertEqual(response.status_code, 200)
        self.assertContains(response, 'Start a Booking Request')

    def test_booking_detail_requires_owner(self):
        booking = Booking.objects.create(
            booking_id='DP-OWNER1',
            user=self.user,
            customer_name='Owner',
            customer_email='owner@example.com',
            customer_phone='+923001112233',
            package=self.package,
            departure_date=date.today() + timedelta(days=10),
            travelers_count=1,
            total_price=self.package.price,
        )
        self.assertEqual(self.client.get(reverse('bookings:detail', kwargs={'booking_id': booking.booking_id})).status_code, 302)
        self.client.login(username='other', password='StrongPassword123!')
        self.assertEqual(self.client.get(reverse('bookings:detail', kwargs={'booking_id': booking.booking_id})).status_code, 403)
        self.client.logout()
        self.client.login(username='owner', password='StrongPassword123!')
        self.assertEqual(self.client.get(reverse('bookings:detail', kwargs={'booking_id': booking.booking_id})).status_code, 200)

    def test_booking_api_requires_authentication(self):
        self.assertEqual(self.client.get('/api/bookings/').status_code, 403)
        self.assertEqual(self.client.post('/api/bookings/', {}).status_code, 403)

    def test_payment_checkout_requires_owner(self):
        booking = Booking.objects.create(
            booking_id='DP-PAY001',
            user=self.user,
            customer_name='Owner',
            customer_email='owner@example.com',
            customer_phone='+923001112233',
            package=self.package,
            departure_date=date.today() + timedelta(days=10),
            travelers_count=1,
            total_price=self.package.price,
        )
        self.assertEqual(self.client.get(reverse('payments:checkout', kwargs={'booking_id': booking.booking_id})).status_code, 302)
        self.client.login(username='owner', password='StrongPassword123!')
        response = self.client.post(reverse('payments:checkout', kwargs={'booking_id': booking.booking_id}), {'method': 'card'})
        self.assertEqual(response.status_code, 302)
        booking.refresh_from_db()
        self.assertEqual(booking.status, 'pending')
        payment = Payment.objects.get(booking=booking)
        self.assertEqual(payment.status, 'pending')
