<?php
/**
 * Discover Pakistan / Nature Hike Pakistan - Master Configuration & Global Data Store
 * Authentic Real Imagery, Reference Site Data & Flexible Travel Metadata
 */

$siteTitle = 'Discover Pakistan';
$siteTagline = 'Best Pakistan Tour Packages 2026 | Customized Private & Group Tours';
$siteDescription = 'Discover Pakistan offers the best Pakistan tour packages from Lahore, Islamabad, and Karachi, including private and public group tours.';
$sitePhone = '+92 303 4364467';
$sitePhoneFormatted = '+92 303 4364467';
$siteWhatsApp = '923034364467';
$siteEmail = 'info@naturehikepakistan.pk';
$siteAddress = 'PL-26, Siddiq Trade Centre, Gulberg II, Lahore';
$siteAddressIslamabad = 'Executive Tower, Blue Area, Islamabad';

$featuredDestinations = [
    [
        'id' => 1,
        'title' => 'Hunza Valley',
        'province' => 'Gilgit-Baltistan',
        'category' => 'mountains',
        'rating' => 4.9,
        'reviews_count' => 128,
        'tag' => 'Alpine Paradise',
        'altitude' => '2,438 m (8,000 ft)',
        'airport' => 'Gilgit Airport (55 mins flight from ISB) or KKH Scenic Drive',
        'weather' => 'May–Oct: 18°C–26°C | Nov–Feb: -5°C–8°C',
        'excerpt' => 'A cinematic mountain kingdom of emerald terraced orchards, snow-dusted Karakoram peaks, ancient Silk Road forts, and turquoise Attabad Lake.',
        'image' => 'assets/images/destinations/hunza-valley.jpg',
        'best_time' => 'April to October (Blossoms in April, Autumn in October)',
        'highlights' => ['Attabad Lake Jet-Ski & Boat Charter', 'Baltit & Altit 700-Year Forts', 'Passu Cones Golden Hour Trek', 'Hussaini Suspension Bridge crossing'],
        'flexibility' => ['Free Cancellation up to 7 days', 'Customizable Daily Itinerary', 'Private 4x4 Prado or VIP Van']
    ],
    [
        'id' => 2,
        'title' => 'Skardu & Deosai',
        'province' => 'Gilgit-Baltistan',
        'category' => 'mountains',
        'rating' => 4.9,
        'reviews_count' => 95,
        'tag' => 'Roof of the World',
        'altitude' => '2,228 m to 4,114 m (Deosai Plateau)',
        'airport' => 'Skardu International Airport (Direct flights from Islamabad, Lahore, Karachi)',
        'weather' => 'Jun–Sep: 15°C–24°C | Deosai Nights: 2°C–7°C',
        'excerpt' => 'Gateway to four 8,000m giants (including K2), high-altitude crystal lakes, mystical Katpana cold desert dunes, and Shangrila pagoda chalets.',
        'image' => 'assets/images/destinations/skardu-deosai.jpg',
        'best_time' => 'June to September (Deosai Plains open July–September)',
        'highlights' => ['Lower Kachura Shangrila Resort', 'Deosai Plains & Sheosar Lake Wildlife Safari', 'Katpana Cold Desert Stargazing & Bonfire', 'Shigar Fort Royal Palace Tour'],
        'flexibility' => ['Instant Flight Delay Re-routing', 'Choice of Luxury Chalet or Glamping', 'Full 4x4 Off-Road Equipment Included']
    ],
    [
        'id' => 3,
        'title' => 'Lahore Heritage District',
        'province' => 'Punjab',
        'category' => 'heritage',
        'rating' => 4.8,
        'reviews_count' => 210,
        'tag' => 'Mughal Splendor',
        'altitude' => '217 m (712 ft)',
        'airport' => 'Allama Iqbal International Airport (LHE)',
        'weather' => 'Oct–Mar: 14°C–25°C | Apr–Sep: Warm & Monsoon',
        'excerpt' => 'The living cultural heart of Pakistan featuring grand Mughal architecture, UNESCO heritage sites, frescoed mosques, and legendary culinary food streets.',
        'image' => 'assets/images/destinations/lahore-heritage.jpg',
        'best_time' => 'October to March (Pleasant winter festival season)',
        'highlights' => ['Badshahi Mosque & Lahore Fort (Sheesh Mahal)', 'Wazir Khan Mosque Fresco Walk', 'Haveli Rooftop Dining overlooking Badshahi', 'Delhi Gate & Shahi Hammam Restoration Tour'],
        'flexibility' => ['Private Licensed Historian Escort', 'Flexible Day/Evening Start Times', 'Boutique Haveli or 5-Star Stay Option']
    ],
    [
        'id' => 4,
        'title' => 'Gwadar & Hingol Coast',
        'province' => 'Balochistan',
        'category' => 'coastal',
        'rating' => 4.7,
        'reviews_count' => 74,
        'tag' => 'Coastal Haven',
        'altitude' => 'Sea Level to 150 m (Koh-e-Batil Clifftops)',
        'airport' => 'Gwadar International Airport (GWD)',
        'weather' => 'Nov–Mar: 22°C–28°C (Pleasant coastal breezes)',
        'excerpt' => 'Dramatic golden cliffs plunging into deep turquoise Arabian waters along the legendary Makran Coastal Highway, Kund Malir beach, and Princess of Hope rock formations.',
        'image' => 'assets/images/destinations/gwadar-hingol.jpg',
        'best_time' => 'November to February (Mild weather, zero humidity)',
        'highlights' => ['Princess of Hope & Natural Sphinx formations', 'Kund Malir Golden Beach Sunset', 'Hammerhead Peninsula & Koh-e-Batil Clifftop View', 'Private Dhow & Speedboat Fishing Charter'],
        'flexibility' => ['Custom Overland or Direct Flight Packages', 'Desert Safari + Coastal Cruise Hybrid', 'Beachfront Glamping or Clifftop Hotel']
    ],
    [
        'id' => 5,
        'title' => 'Swat Valley & Kalam',
        'province' => 'Khyber Pakhtunkhwa',
        'category' => 'valleys',
        'rating' => 4.8,
        'reviews_count' => 112,
        'tag' => 'Switzerland of the East',
        'altitude' => '980 m to 2,000 m (Kalam) / 2,800 m (Mahodand)',
        'airport' => 'Islamabad Airport (3.5 hrs via Swat Expressway) or Saidu Sharif Airport',
        'weather' => 'May–Sep: 18°C–28°C | Winter: -2°C–10°C (Ski season)',
        'excerpt' => 'Dense deodar pine forests, emerald roaring glacial rivers, Gandhara Buddhist archaeological treasures, and winter skiing at Malam Jabba.',
        'image' => 'assets/images/destinations/swat-kalam.jpg',
        'best_time' => 'May to October for Valleys; Dec to March for Skiing',
        'highlights' => ['Mahodand Lake 4x4 Expedition', 'Malam Jabba Ski Resort & Chairlift', 'Ushu Forest & Glacial Waterfalls', 'White Palace Marghazar & Mingora Bazaars'],
        'flexibility' => ['Year-Round Ski or Summer Trek Adaptability', 'Free Equipment Rental Upgrades', 'Private Riverfront Cottages']
    ],
    [
        'id' => 6,
        'title' => 'Naran & Kaghan Valley',
        'province' => 'Khyber Pakhtunkhwa',
        'category' => 'valleys',
        'rating' => 4.8,
        'reviews_count' => 140,
        'tag' => 'Glacial Wonder',
        'altitude' => '2,409 m (Naran) to 4,173 m (Babusar Top)',
        'airport' => 'Islamabad International Airport (5.5 hrs drive via Hazara Motorway)',
        'weather' => 'Jun–Aug: 12°C–20°C | Sep–Oct: Crisp Autumn 5°C–15°C',
        'excerpt' => 'Fairytale alpine waters of Lake Saiful Muluk framed by the towering Malika Parbat peak, roaring Kunhar trout river, and panoramic Babusar Pass vistas.',
        'image' => 'assets/images/destinations/naran-kaghan.jpg',
        'best_time' => 'June to September (Babusar Pass open July–October)',
        'highlights' => ['Lake Saiful Muluk Jeep & Horseback Safari', 'Babusar Top (13,700 ft) Gateway to Gilgit', 'Lulusar Lake glacial panorama', 'River Kunhar Fresh Brown Trout BBQ'],
        'flexibility' => ['Babusar Pass to Gilgit Route Extension Option', 'Weather-adaptive flexible lake timing', 'Private Mountain Guides on-demand']
    ]
];

$featuredHotels = [
    [
        'id' => 1,
        'name' => 'Serena Hunza Heritage Inn',
        'location' => 'Karimabad, Hunza Valley',
        'rating' => 5.0,
        'price' => 'PKR 34,000',
        'badge' => 'Mountain View Luxury',
        'image' => 'assets/images/hotels/serena-hunza.jpg',
        'amenities' => ['Panoramic Ultar & Rakaposhi Views', 'Organic Apricot Orchard Dining', 'High-Speed Starlink WiFi', 'Heated Heritage Rooms', 'Private Trek Concierge'],
        'flexibility' => 'Free cancellation up to 48 hours before check-in. Free date modification.'
    ],
    [
        'id' => 2,
        'name' => 'Shangrila Resort Kachura',
        'location' => 'Lower Kachura Lake, Skardu',
        'rating' => 4.9,
        'price' => 'PKR 28,000',
        'badge' => 'Iconic Lakefront Pagodas',
        'image' => 'assets/images/hotels/shangrila-skardu.jpg',
        'amenities' => ['Heart-shaped Lakefront Chalets', 'Private Boating Pier & Kayaks', 'Apple Orchard Gardens', 'Airport Shuttle (20 mins to Skardu Airport)', 'DC-3 Aircraft Cafe'],
        'flexibility' => 'Instant weather-delay flight reschedule guarantee. 100% credit protection.'
    ],
    [
        'id' => 3,
        'name' => 'Pearl Continental Luxury Hotel',
        'location' => 'Mall Road, Lahore',
        'rating' => 4.8,
        'price' => 'PKR 22,000',
        'badge' => '5-Star Metropolitan Heritage',
        'image' => 'assets/images/hotels/pc-lahore.jpg',
        'amenities' => ['Executive Club Lounge', 'Royal Spa & Sauna', 'Outdoor Temperature-controlled Pool', 'Bukhara & Dumpukht Fine Dining', 'Chauffeured City Transport'],
        'flexibility' => 'No-charge cancellation until 6 PM on arrival day. Flexible pay-at-property.'
    ],
    [
        'id' => 4,
        'name' => 'Zaver Pearl Continental Gwadar',
        'location' => 'Koh-e-Batil Cliffs, Gwadar',
        'rating' => 4.8,
        'price' => 'PKR 26,000',
        'badge' => 'Clifftop Ocean View',
        'image' => 'assets/images/hotels/pc-gwadar.jpg',
        'amenities' => ['360° Arabian Sea Clifftop Views', 'Fresh Lobster & Seafood Grill', 'Infinity Pool overlooking Port', 'Speedboat Excursion Desk', 'VIP Airport Transfer'],
        'flexibility' => 'Flexible check-in/check-out for airport arrivals. Free reschedule.'
    ],
    [
        'id' => 5,
        'name' => 'Malam Jabba Ski Resort Hotel',
        'location' => 'Malam Jabba Heights, Swat',
        'rating' => 4.9,
        'price' => 'PKR 29,000',
        'badge' => 'Alpine Ski-in / Ski-out',
        'image' => 'assets/images/hotels/malam-jabba-resort.jpg',
        'amenities' => ['Direct Chairlift & Ski Slope Access', 'Winter Snow Gear Rental Hub', 'Heated Indoor Alpine Lounge', 'Pine Forest Panoramic Balconies', 'Fireside Dining'],
        'flexibility' => 'Snow-condition reschedule guarantee. Flexible family suite configurations.'
    ]
];

$featuredTours = [
    [
        'id' => 1,
        'title' => 'Grand Karakoram & Hunza Expedition',
        'duration' => '8 Days / 7 Nights',
        'price' => 'PKR 175,000',
        'rating' => 4.9,
        'category' => 'mountains',
        'badge' => 'Signature Bestseller',
        'image' => 'assets/images/tours/tour-hunza.jpg',
        'included' => ['Serena Heritage Lodges & Lux Chalets', 'Private 4x4 Prado with Fuel & Driver', 'Attabad Jet-Boat & Fort Entries', 'All Gourmet Meals & Mineral Water'],
        'flexibility' => [
            'cancel' => 'Free cancellation up to 7 days before departure',
            'dates' => '100% Flexible departure dates with private vehicle',
            'payment' => 'Only 25% advance deposit to secure booking; balance on arrival',
            'tier_options' => ['Classic Luxury (Prado)', 'VIP Executive (V8 Land Cruiser)', 'Trekker Expedition']
        ]
    ],
    [
        'id' => 2,
        'title' => 'Skardu & Deosai High-Altitude Safari',
        'duration' => '7 Days / 6 Nights',
        'price' => 'PKR 160,000',
        'rating' => 4.9,
        'category' => 'mountains',
        'badge' => 'High Altitude Safari',
        'image' => 'assets/images/tours/tour-skardu.jpg',
        'included' => ['Shangrila Resort & Shigar Fort Palace', 'Deosai Plains 4x4 Wilderness Expedition', 'Katpana Cold Desert Bonfire & Stargazing', 'Airport Transfers & Certified Guide'],
        'flexibility' => [
            'cancel' => 'Free cancellation or change up to 7 days prior',
            'dates' => 'Daily departures available May to October',
            'payment' => 'Flexible deposit with installment options',
            'tier_options' => ['Standard 4x4', 'VIP Luxury Suite', 'Camp & Glamp Fusion']
        ]
    ],
    [
        'id' => 3,
        'title' => 'Mughal Heritage & Food Trail',
        'duration' => '5 Days / 4 Nights',
        'price' => 'PKR 98,000',
        'rating' => 4.8,
        'category' => 'heritage',
        'badge' => 'Cultural Immersion',
        'image' => 'assets/images/tours/tour-lahore.jpg',
        'included' => ['Boutique Haveli Stay in Walled City', 'Private Licensed Historian & Chauffeur', 'Curated Haveli & Old City Culinary Walks', 'Museum, Fort & Mosque VIP Access'],
        'flexibility' => [
            'cancel' => 'Free cancellation up to 48 hours before start',
            'dates' => 'Available all year round on any chosen weekday',
            'payment' => 'Zero cancellation fee on flexible dates',
            'tier_options' => ['Heritage Boutique', '5-Star Metropolitan (PC/Pearl)', 'Culinary Connoisseur']
        ]
    ],
    [
        'id' => 7,
        'title' => 'Islamabad City & Margalla Hills Tour',
        'duration' => '2 Days / 1 Night',
        'price' => 'PKR 24,000',
        'rating' => 4.8,
        'category' => 'heritage',
        'badge' => 'Capital City Escape',
        'image' => 'assets/images/tours/tour-lahore.jpg',
        'included' => ['Faisal Mosque & Daman-e-Koh', 'Lok Virsa & Rawal Lake Visits', 'Private Driver & Flexible Stops', 'Curated Islamabad Dining'],
        'flexibility' => ['cancel' => 'Free cancellation up to 48 hours before start']
    ],
    [
        'id' => 8,
        'title' => 'Karachi Coastal City Escape',
        'duration' => '3 Days / 2 Nights',
        'price' => 'PKR 32,000',
        'rating' => 4.7,
        'category' => 'coastal',
        'badge' => 'City & Coast',
        'image' => 'assets/images/tours/tour-makran.jpg',
        'included' => ['Mohatta Palace & Frere Hall', 'Quaid-e-Azam Mausoleum', 'Clifton Coastline & Food Trail', 'Private City Transport'],
        'flexibility' => ['cancel' => 'Free cancellation up to 48 hours before start']
    ],
    [
        'id' => 9,
        'title' => 'Peshawar Heritage & Cuisine Walk',
        'duration' => '2 Days / 1 Night',
        'price' => 'PKR 26,000',
        'rating' => 4.7,
        'category' => 'heritage',
        'badge' => 'Old City Heritage',
        'image' => 'assets/images/tours/tour-swat.jpg',
        'included' => ['Qissa Khwani Bazaar & Peshawar Museum', 'Sethi House & Historic Gates', 'Local Heritage Guide', 'Traditional Pashtun Cuisine'],
        'flexibility' => ['cancel' => 'Free cancellation up to 48 hours before start']
    ],
    [
        'id' => 10,
        'title' => 'Multan Sufi Shrines & Crafts Tour',
        'duration' => '2 Days / 1 Night',
        'price' => 'PKR 22,000',
        'rating' => 4.6,
        'category' => 'heritage',
        'badge' => 'City of Saints',
        'image' => 'assets/images/tours/tour-lahore.jpg',
        'included' => ['Blue-Tile Shrine Architecture', 'Old Bazaar & Craft Workshops', 'Local Sufi Heritage Guide', 'Regional Food Experience'],
        'flexibility' => ['cancel' => 'Free cancellation up to 48 hours before start']
    ],
    [
        'id' => 4,
        'title' => 'Makran Coastal & Gwadar Safari',
        'duration' => '6 Days / 5 Nights',
        'price' => 'PKR 125,000',
        'rating' => 4.7,
        'category' => 'coastal',
        'badge' => 'Coastal Expedition',
        'image' => 'assets/images/tours/tour-makran.jpg',
        'included' => ['Zaver PC Gwadar Clifftop Luxury Stay', 'Kund Malir & Hingol Stargazing Safari', 'Speedboat Island Tour & Fresh Catch Lunch', 'Full Boarding & Private 4x4 Transport'],
        'flexibility' => [
            'cancel' => 'Free date change up to 5 days before trip',
            'dates' => 'Weekly guaranteed departures or on-demand private dates',
            'payment' => '25% deposit, remainder on arrival',
            'tier_options' => ['Coastal Executive', 'Desert & Sea Combo', 'Astola Island Explorer']
        ]
    ],
    [
        'id' => 5,
        'title' => 'Fairy Meadows & Nanga Parbat Basecamp',
        'duration' => '6 Days / 5 Nights',
        'price' => 'PKR 145,000',
        'rating' => 4.9,
        'category' => 'mountains',
        'badge' => 'Trekking & Wilderness',
        'image' => 'assets/images/tours/tour-fairy-meadows.jpg',
        'included' => ['Raikot Bridge 4x4 Mountain Jeep Safari', 'Alpine Wooden Cottages with Fireplace', 'Guided Base Camp Trek & Porter Service', 'Camping Gear & Fresh High-Altitude Cuisine'],
        'flexibility' => [
            'cancel' => 'Free date shifts if weather prevents trekking',
            'dates' => 'Custom dates from June through October',
            'payment' => '30% deposit with full weather guarantee refund',
            'tier_options' => ['Cottage Comfort', 'Alpine Tented Camp', 'High Basecamp Summit Trek']
        ]
    ],
    [
        'id' => 6,
        'title' => 'Swat Valley & Malam Jabba Ski Getaway',
        'duration' => '4 Days / 3 Nights',
        'price' => 'PKR 88,000',
        'rating' => 4.8,
        'category' => 'valleys',
        'badge' => 'Alpine Ski & Nature',
        'image' => 'assets/images/tours/tour-swat.jpg',
        'included' => ['Malam Jabba Ski Resort Deluxe Stay', 'Unlimited Chairlift Passes & Ski Equipment', 'Mahodand Lake 4x4 Excursion', 'Private Chauffeur & Daily Gourmet Breakfast'],
        'flexibility' => [
            'cancel' => 'Free cancellation or date shift if snow conditions change',
            'dates' => 'Flexible weekend or weekday slots',
            'payment' => 'No penalty for winter weather re-schedules',
            'tier_options' => ['Ski Package', 'Sightseeing & Valleys', 'Family Luxury Cabin']
        ]
    ]
];

/* Nature Hike Pakistan - 8 Signature Destination Banners */
$nhDestinationBanners = [
    [
        'title' => 'Hunza',
        'subtitle' => 'Tour Packages',
        'slug' => 'hunza-valley',
        'image' => 'assets/images/destinations/hunza-passu.jpg',
        'link' => 'pages/destinations.php?region=Hunza'
    ],
    [
        'title' => 'Skardu',
        'subtitle' => 'Tour Packages',
        'slug' => 'skardu',
        'image' => 'assets/images/destinations/skardu-deosai.jpg',
        'link' => 'pages/destinations.php?region=Skardu'
    ],
    [
        'title' => 'Swat Kalam',
        'subtitle' => 'Tour Packages',
        'slug' => 'swat-kalam',
        'image' => 'assets/images/destinations/swat-kalam.jpg',
        'link' => 'pages/destinations.php?region=Swat'
    ],
    [
        'title' => 'Murree Nathia Gali',
        'subtitle' => 'Tour Packages',
        'slug' => 'murree-nathia-gali',
        'image' => 'assets/images/destinations/naran-babusar.jpg',
        'link' => 'pages/destinations.php?region=Murree'
    ],
    [
        'title' => 'Naran Kaghan',
        'subtitle' => 'Tour Packages',
        'slug' => 'naran-kaghan',
        'image' => 'assets/images/destinations/naran-kaghan.jpg',
        'link' => 'pages/destinations.php?region=Naran'
    ],
    [
        'title' => 'Azad Kashmir',
        'subtitle' => 'Tour Packages',
        'slug' => 'azad-kashmir',
        'image' => 'assets/images/destinations/fairy-meadows.jpg',
        'link' => 'pages/destinations.php?region=Kashmir'
    ],
    [
        'title' => 'Kumrat Valley',
        'subtitle' => 'Tour Packages',
        'slug' => 'kumrat-valley',
        'image' => 'assets/images/destinations/swat-malam-jabba.jpg',
        'link' => 'pages/destinations.php?region=Kumrat'
    ],
    [
        'title' => 'Lahore City',
        'subtitle' => 'Tour Packages',
        'slug' => 'lahore-city',
        'image' => 'assets/images/destinations/lahore-heritage.jpg',
        'link' => 'pages/destinations.php?region=Lahore'
    ]
];

/* Nature Hike Pakistan - Weekly Public Group Tours */
$nhGroupTours = [
    [
        'id' => 101,
        'title' => '8 Days Hunza and Skardu Valley Group Tour',
        'location' => 'Gilgit Baltistan',
        'price' => '40,000',
        'photos_count' => 11,
        'image' => 'assets/images/tours/tour-hunza.jpg',
        'days' => '8 Days',
        'link' => 'pages/tours.php'
    ],
    [
        'id' => 102,
        'title' => '6 Days Skardu and Basho Valley Group Tour',
        'location' => 'Skardu Valley',
        'price' => '34,000',
        'photos_count' => 8,
        'image' => 'assets/images/tours/tour-skardu.jpg',
        'days' => '6 Days',
        'link' => 'pages/tours.php'
    ],
    [
        'id' => 103,
        'title' => '5 Days Hunza, Naltar & Khunjerab Pass Group Tour',
        'location' => 'Hunza Valley',
        'price' => '28,000',
        'photos_count' => 14,
        'image' => 'assets/images/destinations/hunza-valley.jpg',
        'days' => '5 Days',
        'link' => 'pages/tours.php'
    ],
    [
        'id' => 104,
        'title' => '4 Days Arang Kel & Taobat Neelum Valley Kashmir',
        'location' => 'Neelum Valley, AJK',
        'price' => '22,000',
        'photos_count' => 12,
        'image' => 'assets/images/destinations/fairy-meadows.jpg',
        'days' => '4 Days',
        'link' => 'pages/tours.php'
    ],
    [
        'id' => 105,
        'title' => '3 Days Kalam and Malam Jabba Swat Group Tour',
        'location' => 'Swat Valley',
        'price' => '17,000',
        'photos_count' => 9,
        'image' => 'assets/images/destinations/swat-kalam.jpg',
        'days' => '3 Days',
        'link' => 'pages/tours.php'
    ],
    [
        'id' => 106,
        'title' => '3 Days Naran Kaghan & Babusar Top Group Tour',
        'location' => 'Kaghan Valley',
        'price' => '17,000',
        'photos_count' => 11,
        'image' => 'assets/images/destinations/naran-kaghan.jpg',
        'days' => '3 Days',
        'link' => 'pages/tours.php'
    ],
    [
        'id' => 107,
        'title' => '3 Days Kumrat Valley & Thal Forest Group Tour',
        'location' => 'Kumrat Valley',
        'price' => '17,000',
        'photos_count' => 7,
        'image' => 'assets/images/destinations/swat-malam-jabba.jpg',
        'days' => '3 Days',
        'link' => 'pages/tours.php'
    ],
    [
        'id' => 108,
        'title' => '2 Days Shogran & Siri Paye Kaghan Group Tour',
        'location' => 'Shogran, Kaghan',
        'price' => '11,000',
        'photos_count' => 9,
        'image' => 'assets/images/destinations/naran-babusar.jpg',
        'days' => '2 Days',
        'link' => 'pages/tours.php'
    ]
];

/* Nature Hike Pakistan - Tailor-Made Tour Packages Quick List */
$nhTailorMadePackages = [
    ['title' => '4 Days Kalam, Mahudand Lake, Malam Jabba, and Green Top Tour', 'dest' => 'Swat & Kalam', 'days' => '4 Days', 'type' => 'Private Tailor-Made'],
    ['title' => '3 Days Malam Jabba and Kalam Tour', 'dest' => 'Swat Valley', 'days' => '3 Days', 'type' => 'Private Tailor-Made'],
    ['title' => '4 Days Murree, Patriata, Nathia Gali, and Khanaspur Ayubia Tour', 'dest' => 'Galiyat & Murree', 'days' => '4 Days', 'type' => 'Private Tailor-Made'],
    ['title' => '3 Days Shogran, Siri Paye, and Nathia Gali Tour', 'dest' => 'Kaghan & Galiyat', 'days' => '3 Days', 'type' => 'Private Tailor-Made'],
    ['title' => '6 Days By-Road Skardu Valley Tour', 'dest' => 'Skardu & Deosai', 'days' => '6 Days', 'type' => 'Private Tailor-Made'],
    ['title' => '4 Days By-Air Skardu and Shigar Valley Tour', 'dest' => 'Skardu & Shigar', 'days' => '4 Days', 'type' => 'By-Air Executive'],
    ['title' => '6 Days By-Road Hunza Valley and Khunjerab Pass China Border Tour', 'dest' => 'Hunza & KKH', 'days' => '6 Days', 'type' => 'Private Tailor-Made'],
    ['title' => '4 Day By-Air Hunza Valley and Khunjerab Pass China Border Tour', 'dest' => 'Hunza Valley', 'days' => '4 Days', 'type' => 'By-Air Executive'],
    ['title' => '7 Days Malam Jabba, Kalam, and Nathia Gali Tour', 'dest' => 'KPK & Galiyat', 'days' => '7 Days', 'type' => 'Private Family Tour'],
    ['title' => '5 Days By-Air Soq Valley Skardu and Deosai Tour', 'dest' => 'Skardu Valley', 'days' => '5 Days', 'type' => 'By-Air Executive'],
    ['title' => '8 Days By-Road Hunza Valley and Skardu Valley Tour', 'dest' => 'Hunza & Skardu', 'days' => '8 Days', 'type' => 'Grand Expedition']
];

/* Nature Hike Pakistan - Real Verified Google Testimonials */
$nhTestimonials = [
    [
        'name' => 'Muhammad Nauraiz Mushtaq',
        'role' => 'Verified Traveler',
        'quote' => 'Our trip to Swat, Malam Jabba, and Kalam was phenomenal. Great thanks to the outstanding services provided by NatureHikePakistan and our guide, Neha. From transport to food and organization, every detail was handled meticulously.',
        'rating' => 5,
        'source' => 'Google Review'
    ],
    [
        'name' => 'Ali Rehman',
        'role' => 'Family Traveler',
        'quote' => 'The best decision I ever made by myself by choosing Nature Hike Pakistan for my vacation. From pick up from my home to the best hotels in town, confident rider and a comfortable car, beautiful view and variety of shopping options. 5 hotels, 21 viewpoints, hassle-free!',
        'rating' => 5,
        'source' => 'Google Review'
    ],
    [
        'name' => 'Hasnain Javaid',
        'role' => 'Private Tour Client',
        'quote' => 'Neha and I spoke for months before our trip finalising each and every detail for our private trip. It was perfect. Got to choose my own hotels and map out the route. The driver and the car were also very good. Would recommend 100%.',
        'rating' => 5,
        'source' => 'Google Review'
    ],
    [
        'name' => 'Aleena Hussain',
        'role' => 'Group Explorer',
        'quote' => 'Everything was amazing and perfect and we all had such a fun and memorable time. Thank you for accommodating us, and actually listening to us. Would definitely recommend your tour company to others. Thank you so much for this great and memorable trip.',
        'rating' => 5,
        'source' => 'Google Review'
    ],
    [
        'name' => 'Roshana Mughal',
        'role' => 'Karachi Traveler',
        'quote' => 'Had an amazing 10 day trip for Hunza, Naran with NatureHikePakistan.pk. It is also highly recommended for Karachites as well. Thanks much Neha the Guide, Photographer, buddy for your support and courage during this tour.',
        'rating' => 5,
        'source' => 'Google Review'
    ],
    [
        'name' => 'Rabia Ali',
        'role' => 'Weekend Traveler',
        'quote' => 'Went to a two day trip with NatureHikePakistan to Shogran. The team is very cooperative and friendly. Their time management is excellent. The bonfire night with bar b que arrangements was my favorite part of the trip.',
        'rating' => 5,
        'source' => 'Google Review'
    ]
];
