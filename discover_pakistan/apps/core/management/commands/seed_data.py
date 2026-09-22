from django.core.management.base import BaseCommand
from django.contrib.auth import get_user_model
from apps.destinations.models import Province, Destination
from apps.hotels.models import Hotel
from apps.packages.models import TourPackage
from apps.restaurants.models import Restaurant
from apps.bookings.models import Booking
from apps.reviews.models import Review
from apps.blog.models import Category, BlogPost
from datetime import date, timedelta

User = get_user_model()


class Command(BaseCommand):
    help = 'Populates the Discover Pakistan database with rich, verified real-world photography and flexible luxury travel data.'

    def handle(self, *args, **options):
        self.stdout.write(self.style.NOTICE('Starting Discover Pakistan real data seeding...'))

        # 1. Create / Update Admin & Demo User
        admin_user = User.objects.filter(username='admin').first()
        if admin_user is None and options.get('verbosity', 1) > 1:
            self.stdout.write(self.style.WARNING('No admin user created. Run createsuperuser separately.'))
        if admin_user is None:
            admin_user = User.objects.create_user(
                username='seed-owner',
                email='seed-owner@discoverpakistan.travel',
                first_name='Seed',
                last_name='Owner',
                password=None,
            )
            admin_user.set_unusable_password()
            admin_user.save(update_fields=['password'])

        demo_user, demo_created = User.objects.get_or_create(
            username='traveler',
            defaults={
                'email': 'traveler@example.com',
                'first_name': 'Tariq',
                'last_name': 'Mehmood',
                'bio': 'Passionate mountain explorer and culture enthusiast.'
            }
        )
        if demo_created:
            demo_user.set_unusable_password()
            demo_user.save(update_fields=['password'])

        # 2. Provinces
        provinces_data = [
            ('Gilgit-Baltistan', 'gilgit-baltistan'),
            ('Khyber Pakhtunkhwa', 'khyber-pakhtunkhwa'),
            ('Punjab', 'punjab'),
            ('Balochistan', 'balochistan'),
            ('Sindh', 'sindh'),
            ('Azad Jammu & Kashmir', 'azad-kashmir'),
            ('Islamabad Capital Territory', 'islamabad-capital-territory'),
        ]
        provinces = {}
        for name, slug in provinces_data:
            prov, _ = Province.objects.get_or_create(slug=slug, defaults={'name': name})
            provinces[slug] = prov

        # 3. Destinations with Real Images, Exact Elevation, Airport Info & Flexibility
        destinations_data = [
            {
                'title': 'Hunza Valley',
                'slug': 'hunza-valley',
                'province': provinces['gilgit-baltistan'],
                'description': 'A cinematic mountain kingdom of emerald terraced orchards, snow-dusted Karakoram peaks, ancient Silk Road forts, and turquoise Attabad Lake. [Elevation: 2,438m | Airport: Gilgit 55m | 100% Flexible Cancellation up to 7 days]',
                'history': 'Ruled for centuries by the Mirs of Hunza from Baltit and Altit Forts, this valley was an essential mountain kingdom along the ancient Silk Road connecting South and Central Asia.',
                'best_time_to_visit': 'April to October (Blossoms in April, Golden Foliage in October)',
                'rating': 4.90,
                'featured_image': 'destinations/hunza-valley.jpg'
            },
            {
                'title': 'Skardu & Deosai',
                'slug': 'skardu-deosai',
                'province': provinces['gilgit-baltistan'],
                'description': 'Gateway to four 8,000m giants (including K2), high-altitude crystal lakes, mystical Katpana cold desert dunes, and Shangrila pagoda chalets. [Elevation: 2,228m–4,114m | Airport: Skardu Int’l Direct Jet Flights | Free Weather Reschedule]',
                'history': 'Skardu was the historic seat of the Maqpon dynasty that connected Baltistan with Central Asia and Kashmir, celebrated for its 600-year-old Shigar Fort Palace.',
                'best_time_to_visit': 'June to September (Deosai Plateau Wildflowers)',
                'rating': 4.90,
                'featured_image': 'destinations/skardu-deosai.jpg'
            },
            {
                'title': 'Lahore Heritage District',
                'slug': 'lahore-heritage',
                'province': provinces['punjab'],
                'description': 'The living cultural heart of Pakistan featuring grand Mughal architecture, UNESCO heritage citadels, frescoed mosques, and legendary culinary food streets. [Elevation: 217m | Airport: Allama Iqbal Int’l (LHE) | Private Historian Escort]',
                'history': 'Imperial capital of the Mughal Empire under Emperor Akbar, Jehangir, and Shah Jahan, adorned with the Badshahi Mosque (1673) and Lahore Fort Sheesh Mahal.',
                'best_time_to_visit': 'October to March (Pleasant winter festival season)',
                'rating': 4.80,
                'featured_image': 'destinations/lahore-heritage.jpg'
            },
            {
                'title': 'Gwadar & Hingol Coast',
                'slug': 'gwadar-hingol',
                'province': provinces['balochistan'],
                'description': 'Dramatic golden cliffs meeting deep turquoise Arabian waters along the legendary Makran Coastal Highway, Kund Malir beach, and Princess of Hope rock formations. [Elevation: Sea Level | Airport: Gwadar Int’l | Speedboat Island Cruise]',
                'history': 'Historical deep-water maritime sanctuary administered by the Sultanate of Oman until 1958, now a premier blue-water coastal harbor.',
                'best_time_to_visit': 'November to February (Mild coastal breeze)',
                'rating': 4.70,
                'featured_image': 'destinations/gwadar-hingol.jpg'
            },
            {
                'title': 'Swat Valley & Kalam',
                'slug': 'swat-valley',
                'province': provinces['khyber-pakhtunkhwa'],
                'description': 'Dense deodar pine forests, emerald roaring glacial rivers, Gandhara Buddhist archaeological treasures, and winter skiing at Malam Jabba. [Elevation: 980m–2,800m | Access: Swat Motorway 3.5 hrs from ISB | Year-Round Ski/Trek Flex]',
                'history': 'Known in Sanskrit antiquity as Uddiyana ("Garden"), Swat was a major global center of Gandhara Buddhism with over 1,400 monasteries recorded by Buddhist pilgrims.',
                'best_time_to_visit': 'May to October for Valleys; Dec to March for Malam Jabba Skiing',
                'rating': 4.80,
                'featured_image': 'destinations/swat-kalam.jpg'
            },
            {
                'title': 'Naran & Kaghan Valley',
                'slug': 'naran-kaghan',
                'province': provinces['khyber-pakhtunkhwa'],
                'description': 'Fairytale alpine waters of Lake Saiful Muluk framed by Malika Parbat peak, roaring Kunhar trout river, and panoramic Babusar Pass vistas. [Elevation: 2,409m–4,173m | Access: Hazara Motorway | Weather-Adaptive Itinerary]',
                'history': 'Famous folklore of Prince Saiful Muluk and fairy princess Badri-ul-Jamal, historically connecting the fertile Hazara plains to the high Karakoram through Babusar Top.',
                'best_time_to_visit': 'June to September (Babusar Pass Open July–October)',
                'rating': 4.80,
                'featured_image': 'destinations/naran-kaghan.jpg'
            },
            {
                'title': 'Fairy Meadows & Nanga Parbat',
                'slug': 'fairy-meadows',
                'province': provinces['gilgit-baltistan'],
                'description': 'High alpine pastures offering unmatched close-up vistas of Nanga Parbat (8,126m), the world’s 9th highest mountain and highest rock face on earth. [Elevation: 3,300m | Raikot Bridge 4x4 Jeep Safari | Alpine Wooden Cottages]',
                'history': 'Named Fairy Meadows ("Marchenwiese") by German mountaineers in the 1930s, this tranquil alpine plateau is the traditional staging ground for Nanga Parbat expeditions.',
                'best_time_to_visit': 'June to October',
                'rating': 4.90,
                'featured_image': 'destinations/fairy-meadows.jpg'
            },
            {
                'title': 'Islamabad Capital Highlights',
                'slug': 'islamabad-city-tour',
                'province': provinces['islamabad-capital-territory'],
                'description': 'A relaxed city day across Faisal Mosque, Daman-e-Koh, Lok Virsa, Rawal Lake, and the Margalla foothills with a private driver and flexible stops.',
                'history': 'Pakistan’s purpose-built capital blends modern civic architecture with the wooded Margalla Hills and a growing collection of national museums and cultural spaces.',
                'best_time_to_visit': 'October to April',
                'rating': 4.80,
                'featured_image': 'destinations/lahore-heritage.jpg'
            },
            {
                'title': 'Karachi Coast & Heritage Tour',
                'slug': 'karachi-city-tour',
                'province': provinces['sindh'],
                'description': 'See the Quaid-e-Azam Mausoleum, Mohatta Palace, Frere Hall, Clifton Beach, and Karachi’s celebrated food scene in one curated city experience.',
                'history': 'Karachi grew from a historic port settlement into Pakistan’s largest coastal metropolis, shaped by maritime trade, migration, and layered colonial and local architecture.',
                'best_time_to_visit': 'November to March',
                'rating': 4.70,
                'featured_image': 'destinations/gwadar-hingol.jpg'
            },
            {
                'title': 'Peshawar Heritage & Food Walk',
                'slug': 'peshawar-city-tour',
                'province': provinces['khyber-pakhtunkhwa'],
                'description': 'Explore Qissa Khwani Bazaar, Peshawar Museum, Sethi House, historic gates, and traditional cuisine with a local heritage guide.',
                'history': 'Peshawar is one of South Asia’s oldest living cities and a historic gateway between the Afghan highlands, Central Asia, and the plains of the subcontinent.',
                'best_time_to_visit': 'October to March',
                'rating': 4.70,
                'featured_image': 'destinations/swat-kalam.jpg'
            },
            {
                'title': 'Multan Sufi Heritage Tour',
                'slug': 'multan-city-tour',
                'province': provinces['punjab'],
                'description': 'Visit the shrines, blue-tile monuments, bazaars, and craft workshops that make Multan one of Pakistan’s richest cultural cities.',
                'history': 'Known as the City of Saints, Multan has been a center of Sufi scholarship, trade, ceramics, and pilgrimage for centuries.',
                'best_time_to_visit': 'November to February',
                'rating': 4.60,
                'featured_image': 'destinations/lahore-heritage.jpg'
            }
        ]

        created_dests = {}
        for d in destinations_data:
            dest, created = Destination.objects.get_or_create(
                slug=d['slug'],
                defaults={
                    'title': d['title'],
                    'province': d['province'],
                    'description': d['description'],
                    'history': d['history'],
                    'best_time_to_visit': d['best_time_to_visit'],
                    'rating': d['rating'],
                    'featured_image': d['featured_image'],
                    'created_by': admin_user
                }
            )
            if not created:
                dest.title = d['title']
                dest.description = d['description']
                dest.history = d['history']
                dest.best_time_to_visit = d['best_time_to_visit']
                dest.rating = d['rating']
                dest.featured_image = d['featured_image']
                dest.save()
            created_dests[d['slug']] = dest

        # 4. Hotels with Real Images & Flexible Policies
        hotels_data = [
            {
                'name': 'Serena Hunza Heritage Inn',
                'destination': created_dests['hunza-valley'],
                'description': 'Luxury boutique inn overlooking Karimabad and the majestic Rakaposhi peak. Features heated heritage rooms, organic apricot orchard dining, Starlink WiFi, and free cancellation up to 48 hours.',
                'price_per_night': 34000.00,
                'rating': 5.0,
                'image': 'hotels/serena-hunza.jpg'
            },
            {
                'name': 'Shangrila Resort Kachura',
                'destination': created_dests['skardu-deosai'],
                'description': 'Fairytale lakefront resort nestled beside the heart-shaped crystal waters of Lower Kachura Lake. Includes private boating pier, airport transfers, and 100% flight-delay weather guarantee.',
                'price_per_night': 28000.00,
                'rating': 4.9,
                'image': 'hotels/shangrila-skardu.jpg'
            },
            {
                'name': 'Pearl Continental Luxury Hotel',
                'destination': created_dests['lahore-heritage'],
                'description': '5-star metropolitan executive hotel located along Lahore’s historic Mall Road. Features Bukhara dining, royal spa, temperature-controlled pool, and zero prepayment cancellation.',
                'price_per_night': 22000.00,
                'rating': 4.8,
                'image': 'hotels/pc-lahore.jpg'
            },
            {
                'name': 'Serena Hotel Islamabad',
                'destination': created_dests['lahore-heritage'],
                'description': 'Mughal architectural masterwork in the diplomatic enclave with 8 multi-cuisine restaurants, Maisha spa, and VIP fast-track airport concierge.',
                'price_per_night': 42000.00,
                'rating': 5.0,
                'image': 'hotels/serena-islamabad.jpg'
            },
            {
                'name': 'Zaver Pearl Continental Gwadar',
                'destination': created_dests['gwadar-hingol'],
                'description': 'Perched atop the cliffs of Koh-e-Batil with 360-degree panoramic views of the Arabian Sea, infinity pool, and fresh lobster dining.',
                'price_per_night': 26000.00,
                'rating': 4.7,
                'image': 'hotels/pc-gwadar.jpg'
            },
            {
                'name': 'Malam Jabba Ski Resort & Spa',
                'destination': created_dests['swat-valley'],
                'description': 'Direct ski-in/ski-out chalet with chairlift passes, heated indoor fireside lounges, alpine pine forest balconies, and flexible winter snow re-schedules.',
                'price_per_night': 25000.00,
                'rating': 4.8,
                'image': 'hotels/malam-jabba-resort.jpg'
            }
        ]
        created_hotels = []
        for h in hotels_data:
            hotel, created = Hotel.objects.get_or_create(
                name=h['name'],
                destination=h['destination'],
                defaults={
                    'description': h['description'],
                    'price_per_night': h['price_per_night'],
                    'rating': h['rating'],
                    'image': h['image']
                }
            )
            if not created:
                hotel.description = h['description']
                hotel.price_per_night = h['price_per_night']
                hotel.rating = h['rating']
                hotel.image = h['image']
                hotel.save()
            created_hotels.append(hotel)

        # 5. Tour Packages with Real Images, Clear Inclusions & Flexibility
        packages_data = [
            {
                'title': 'Grand Karakoram & Hunza Expedition',
                'slug': 'grand-karakoram-hunza',
                'duration_days': 8,
                'price': 175000.00,
                'description': 'All-inclusive 8-day expedition featuring Serena heritage stays, private 4x4 Prado with fuel and driver, Attabad jet-boat cruise, and Passu Cones trek. 100% Free cancellation up to 7 days; 25% deposit to reserve.',
                'featured_image': 'packages/tour-hunza.jpg',
                'dest': created_dests['hunza-valley']
            },
            {
                'title': 'Skardu & Deosai High-Altitude Safari',
                'slug': 'skardu-deosai-safari',
                'duration_days': 7,
                'price': 160000.00,
                'description': '7-day high-altitude exploration of Deosai Plains (4,114m), Shangrila Resort, Katpana cold desert stargazing, and Shigar Fort Palace. Includes instant flight-delay weather re-routing.',
                'featured_image': 'packages/tour-skardu.jpg',
                'dest': created_dests['skardu-deosai']
            },
            {
                'title': 'Mughal Heritage & Food Trail',
                'slug': 'mughal-heritage-trail',
                'duration_days': 5,
                'price': 98000.00,
                'description': '5-day cultural and culinary immersion into the monuments, havelis, and culinary secrets of Lahore with private licensed historian and chauffeured city transport.',
                'featured_image': 'packages/tour-lahore.jpg',
                'dest': created_dests['lahore-heritage']
            },
            {
                'title': 'Islamabad City & Margalla Hills Tour',
                'slug': 'islamabad-city-margalla-tour',
                'duration_days': 2,
                'price': 24000.00,
                'description': 'A two-day private city break covering Faisal Mosque, Daman-e-Koh, Lok Virsa, Rawal Lake, and Islamabad’s best local dining with a dedicated driver.',
                'featured_image': 'packages/tour-lahore.jpg',
                'dest': created_dests['islamabad-city-tour']
            },
            {
                'title': 'Karachi Coastal City Escape',
                'slug': 'karachi-coastal-city-escape',
                'duration_days': 3,
                'price': 32000.00,
                'description': 'A three-day Karachi itinerary combining heritage landmarks, Clifton coastline, Mohatta Palace, local markets, and a curated seafood dinner.',
                'featured_image': 'packages/tour-makran.jpg',
                'dest': created_dests['karachi-city-tour']
            },
            {
                'title': 'Peshawar Heritage & Cuisine Walk',
                'slug': 'peshawar-heritage-cuisine-walk',
                'duration_days': 2,
                'price': 26000.00,
                'description': 'A guided two-day introduction to Peshawar’s old city, museums, historic homes, bazaars, and traditional Pashtun cuisine.',
                'featured_image': 'packages/tour-swat.jpg',
                'dest': created_dests['peshawar-city-tour']
            },
            {
                'title': 'Multan Sufi Shrines & Crafts Tour',
                'slug': 'multan-sufi-crafts-tour',
                'duration_days': 2,
                'price': 22000.00,
                'description': 'Discover Multan’s blue-tile shrines, Sufi heritage, old bazaars, camel-skin craft traditions, and regional food with a local guide.',
                'featured_image': 'packages/tour-lahore.jpg',
                'dest': created_dests['multan-city-tour']
            },
            {
                'title': 'Makran Coastal & Gwadar Safari',
                'slug': 'makran-coastal-safari',
                'duration_days': 6,
                'price': 125000.00,
                'description': '6-day coastal safari across Kund Malir golden beach, Princess of Hope rock formations, Hingol National Park stargazing, and Zaver PC clifftop luxury stay.',
                'featured_image': 'packages/tour-makran.jpg',
                'dest': created_dests['gwadar-hingol']
            },
            {
                'title': 'Fairy Meadows & Nanga Parbat Basecamp',
                'slug': 'fairy-meadows-trek',
                'duration_days': 6,
                'price': 145000.00,
                'description': '6-day wilderness trek to Fairy Meadows alpine pastures overlooking Nanga Parbat (8,126m). Includes Raikot 4x4 mountain jeep, wooden alpine cottage, and porter service.',
                'featured_image': 'packages/tour-fairy-meadows.jpg',
                'dest': created_dests['fairy-meadows']
            },
            {
                'title': 'Swat Valley & Malam Jabba Ski Getaway',
                'slug': 'swat-malam-jabba-getaway',
                'duration_days': 4,
                'price': 88000.00,
                'description': '4-day alpine getaway featuring Malam Jabba Ski Resort stay, unlimited chairlift passes, Mahodand Lake 4x4 excursion, and traditional Swati trout dinner.',
                'featured_image': 'packages/tour-swat.jpg',
                'dest': created_dests['swat-valley']
            }
        ]
        created_packages = []
        for p in packages_data:
            pkg, created = TourPackage.objects.get_or_create(
                slug=p['slug'],
                defaults={
                    'title': p['title'],
                    'duration_days': p['duration_days'],
                    'price': p['price'],
                    'description': p['description'],
                    'featured_image': p['featured_image']
                }
            )
            if not created:
                pkg.title = p['title']
                pkg.duration_days = p['duration_days']
                pkg.price = p['price']
                pkg.description = p['description']
                pkg.featured_image = p['featured_image']
                pkg.save()
            pkg.destinations.add(p['dest'])
            created_packages.append(pkg)

        # 6. Restaurants
        restaurants_data = [
            {
                'name': 'The Monal Margalla',
                'destination': created_dests['lahore-heritage'],
                'cuisine': 'Pakistani & Barbecue',
                'description': 'Iconic dining with panoramic skyline views of Islamabad and Margalla hills.',
                'rating': 4.8
            },
            {
                'name': 'Haveli Restaurant Old Lahore',
                'destination': created_dests['lahore-heritage'],
                'cuisine': 'Traditional Mughlai & Tandoor',
                'description': 'Rooftop dining with unmatched direct views of the illuminated Badshahi Mosque.',
                'rating': 4.9
            },
            {
                'name': 'Yak Grill Hunza',
                'destination': created_dests['hunza-valley'],
                'cuisine': 'Organic Pamiri & Grilled Yak',
                'description': 'Famous for juicy mountain yak burgers and organic herbal soups in Passu.',
                'rating': 4.7
            }
        ]
        for r in restaurants_data:
            Restaurant.objects.get_or_create(
                name=r['name'],
                destination=r['destination'],
                defaults={
                    'cuisine': r['cuisine'],
                    'description': r['description'],
                    'rating': r['rating']
                }
            )

        # 7. Blog Categories & Posts with Real Photos
        cat_expeditions, _ = Category.objects.get_or_create(slug='expeditions', defaults={'name': 'Expeditions'})
        cat_heritage, _ = Category.objects.get_or_create(slug='heritage', defaults={'name': 'Heritage & Culture'})
        cat_seasonal, _ = Category.objects.get_or_create(slug='seasonal', defaults={'name': 'Seasonal'})

        blog_posts_data = [
            {
                'slug': 'complete-kkh-roadtrip-guide',
                'title': 'The Complete Karakoram Highway Road Trip Guide',
                'category': cat_expeditions,
                'summary': 'Essential planning advice for driving the eighth wonder of the world from Passu Cones to Khunjerab Pass.',
                'content': 'Traversing the Karakoram Highway from Islamabad to the Khunjerab Pass at 4,693 meters is one of the ultimate journeys on planet Earth.',
                'read_time': '8 min read',
                'cover_image': 'blog/blog-kkh.jpg'
            },
            {
                'slug': 'hunza-autumn-guide',
                'title': 'Hunza Valley in Autumn: Golden Poplars & Glacier Vistas',
                'category': cat_seasonal,
                'summary': 'Why October and November turn Hunza and Nagar into an unreal tapestry of fiery orange foliage.',
                'content': 'When the summer crowds recede, the Hunza Valley transforms into a kaleidoscope of golden yellow poplars, flaming red apricot orchards, and razor-sharp snow summits.',
                'read_time': '6 min read',
                'cover_image': 'blog/blog-hunza-autumn.jpg'
            },
            {
                'slug': 'old-lahore-culinary-walk',
                'title': 'An Insider’s Culinary & Heritage Walk Through Old Lahore',
                'category': cat_heritage,
                'summary': 'Explore secret spice alleys, 100-year-old nihari cauldrons, haveli rooftops, and Wazir Khan Mosque.',
                'content': 'Stepping through Delhi Gate into the Walled City is an assault on the senses in the most intoxicating way possible.',
                'read_time': '5 min read',
                'cover_image': 'blog/blog-old-lahore.jpg'
            }
        ]

        for bp in blog_posts_data:
            post, created = BlogPost.objects.get_or_create(
                slug=bp['slug'],
                defaults={
                    'title': bp['title'],
                    'author': admin_user,
                    'category': bp['category'],
                    'summary': bp['summary'],
                    'content': bp['content'],
                    'read_time': bp['read_time'],
                    'cover_image': bp['cover_image'],
                    'is_published': True
                }
            )
            if not created:
                post.title = bp['title']
                post.summary = bp['summary']
                post.content = bp['content']
                post.read_time = bp['read_time']
                post.cover_image = bp['cover_image']
                post.save()

        # 8. Sample Bookings with Flexibility
        Booking.objects.get_or_create(
            booking_id='DP-9041',
            defaults={
                'user': demo_user,
                'customer_name': 'Kamran Khan',
                'customer_email': 'kamran.k@example.com',
                'customer_phone': '+92 300 9876543',
                'package': created_packages[0],
                'departure_date': date.today() + timedelta(days=25),
                'travelers_count': 2,
                'total_price': 350000.00,
                'status': 'confirmed'
            }
        )

        # 9. Sample Reviews
        Review.objects.get_or_create(
            user=demo_user,
            destination=created_dests['hunza-valley'],
            defaults={
                'rating': 5,
                'title': 'Unforgettable mountain experience!',
                'comment': 'Hunza Valley is heavenly. The local people are warm and the scenery is beyond words.',
                'is_approved': True
            }
        )

        self.stdout.write(self.style.SUCCESS('Successfully seeded Discover Pakistan with authentic photos and flexible luxury details!'))
