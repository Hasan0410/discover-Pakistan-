<?php
session_start();
$pageTitle = 'Luxury Hotels & Heritage Resorts';
require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../includes/header.php';

$allHotels = [
    [
        'id' => 1,
        'name' => 'Serena Hunza Heritage Inn',
        'location' => 'Karimabad, Hunza Valley',
        'rating' => 5.0,
        'price' => 'PKR 34,000',
        'image' => '../assets/images/hotels/serena-hunza.jpg',
        'category' => 'mountains',
        'badge' => 'Mountain View Luxury',
        'amenities' => ['Panoramic Ultar & Rakaposhi Views', 'Organic Apricot Orchard Dining', 'High-Speed Starlink WiFi', 'Heated Heritage Rooms', 'Private Trek Concierge'],
        'flexibility' => 'Free cancellation up to 48 hours before check-in • Pay at property'
    ],
    [
        'id' => 2,
        'name' => 'Shangrila Resort Kachura',
        'location' => 'Lower Kachura Lake, Skardu',
        'rating' => 4.9,
        'price' => 'PKR 28,000',
        'image' => '../assets/images/hotels/shangrila-skardu.jpg',
        'category' => 'mountains',
        'badge' => 'Heart-Shaped Lakefront Pagodas',
        'amenities' => ['Lakefront Swiss & Chinese Pagodas', 'Boating Pier & Kayak Access', 'Apple & Cherry Orchard', 'Airport Shuttle (20m to Skardu Airport)', 'DC-3 Aircraft Cafe'],
        'flexibility' => 'Instant weather-delay flight reschedule guarantee • 100% credit'
    ],
    [
        'id' => 3,
        'name' => 'Pearl Continental Luxury Hotel',
        'location' => 'Mall Road, Lahore',
        'rating' => 4.8,
        'price' => 'PKR 22,000',
        'image' => '../assets/images/hotels/pc-lahore.jpg',
        'category' => 'heritage',
        'badge' => '5-Star Metropolitan Heritage',
        'amenities' => ['Executive Club Lounge', 'Royal Spa & Sauna', 'Outdoor Swimming Pool', 'Bukhara & Dumpukht Fine Dining', 'Chauffeured City Transport'],
        'flexibility' => 'No-charge cancellation until 6 PM on arrival day • Flexible booking'
    ],
    [
        'id' => 4,
        'name' => 'Serena Hotel Islamabad',
        'location' => 'Khayaban-e-Suhrawardy, Islamabad',
        'rating' => 5.0,
        'price' => 'PKR 42,000',
        'image' => '../assets/images/hotels/serena-islamabad.jpg',
        'category' => 'heritage',
        'badge' => 'Mughal Architectural Splendor',
        'amenities' => ['5-Star Deluxe Suites', 'Maisha Health Club & Spa', '8 Multi-Cuisine Restaurants', 'Diplomatic Enclave Security', 'Margalla Hills Views'],
        'flexibility' => 'VIP Fast-track check-in • Free cancellation up to 24 hours'
    ],
    [
        'id' => 5,
        'name' => 'Zaver Pearl Continental Gwadar',
        'location' => 'Koh-e-Batil Cliffs, Gwadar',
        'rating' => 4.7,
        'price' => 'PKR 26,000',
        'image' => '../assets/images/hotels/pc-gwadar.jpg',
        'category' => 'coastal',
        'badge' => 'Clifftop Ocean View',
        'amenities' => ['360° Arabian Sea Clifftop Views', 'Fresh Lobster & Seafood Dining', 'Infinity Pool overlooking Port', 'Speedboat Excursion Desk', 'VIP Airport Transfer'],
        'flexibility' => 'Flexible check-in/check-out for flight arrivals • Free date change'
    ],
    [
        'id' => 6,
        'name' => 'Malam Jabba Ski Resort & Spa',
        'location' => 'Malam Jabba, Swat Valley',
        'rating' => 4.8,
        'price' => 'PKR 25,000',
        'image' => '../assets/images/hotels/malam-jabba-resort.jpg',
        'category' => 'valleys',
        'badge' => 'Alpine Ski-in / Ski-out',
        'amenities' => ['Direct Chairlift & Ski Slope Access', 'Winter Snow Gear Rental Hub', 'Heated Indoor Alpine Lounge', 'Pine Forest Panoramic Balconies', 'Fireside Dining'],
        'flexibility' => 'Snow-condition flexible date shifts • Family cabin options'
    ]
];
?>

<main class="page-shell">
  <section class="section">
    <div class="section-heading">
      <span class="eyebrow">Handpicked Authentic Accommodations</span>
      <h2>Luxury Hotels, Heritage Forts & Alpine Lodges</h2>
      <p>Enjoy world-class hospitality, majestic views, and curated amenities across Pakistan's premier boutique stays and 5-star resorts with real photography and free cancellation.</p>
    </div>

    <!-- Filter & Search Toolbar -->
    <div class="filter-bar">
      <div class="filter-pills">
        <button class="filter-btn active" data-filter="all">All Stays</button>
        <button class="filter-btn" data-filter="mountains">Mountain Lodges</button>
        <button class="filter-btn" data-filter="heritage">City & Heritage</button>
        <button class="filter-btn" data-filter="coastal">Coastal Resorts</button>
        <button class="filter-btn" data-filter="valleys">Valley Escapes</button>
      </div>

      <div class="search-input-wrap">
        <svg class="search-icon-svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <circle cx="11" cy="11" r="8"></circle>
          <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
        </svg>
        <input type="text" class="search-input" placeholder="Search hotel by name or location..." aria-label="Search hotels" />
      </div>
    </div>

    <!-- Hotels Grid -->
    <div class="cards-grid">
      <?php foreach ($allHotels as $hotel): ?>
        <article class="card" data-category="<?= htmlspecialchars($hotel['category']) ?>">
          <div class="card-media">
            <span class="card-badge"><?= htmlspecialchars($hotel['badge'] ?? 'Luxury Stay') ?></span>
            <img src="<?= htmlspecialchars($hotel['image']) ?>" alt="<?= htmlspecialchars($hotel['name']) ?>" loading="lazy" />
          </div>
          <div class="card-body">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.5rem;">
              <span style="font-size: 0.8rem; color: var(--gold-accent); font-weight: 600;"><?= htmlspecialchars($hotel['location']) ?></span>
              <span style="font-size: 0.82rem; color: var(--text-muted);">★ <?= $hotel['rating'] ?></span>
            </div>
            <h3><?= htmlspecialchars($hotel['name']) ?></h3>
            <div style="display: flex; flex-wrap: wrap; gap: 0.35rem; margin: 0.75rem 0 1rem;">
              <?php foreach (array_slice($hotel['amenities'], 0, 3) as $amenity): ?>
                <span style="font-size: 0.75rem; background: rgba(255,255,255,0.06); padding: 0.2rem 0.6rem; border-radius: var(--radius-full); border: 1px solid var(--border-subtle);"><?= htmlspecialchars($amenity) ?></span>
              <?php endforeach; ?>
            </div>

            <!-- Flexibility Guarantee -->
            <div style="background: rgba(16,185,129,0.06); padding: 0.4rem 0.75rem; border-radius: var(--radius-sm); font-size: 0.78rem; color: var(--emerald-primary); margin-bottom: 1rem; border-left: 3px solid var(--emerald-primary);">
              🛡️ <?= htmlspecialchars($hotel['flexibility']) ?>
            </div>

            <div class="card-footer">
              <div>
                <span class="price-period">Nightly from</span>
                <div class="price-tag"><?= htmlspecialchars($hotel['price']) ?></div>
              </div>
              <?php 
                $cleanHotelPrice = preg_replace('/[^0-9]/', '', $hotel['price']); 
              ?>
              <button class="btn btn-outline btn-sm btn-book-trigger" data-title="Stay at <?= htmlspecialchars($hotel['name']) ?>" data-price="<?= $cleanHotelPrice ?>">Check Availability</button>
            </div>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
