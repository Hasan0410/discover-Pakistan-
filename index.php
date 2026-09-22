<?php
session_start();
$pageTitle = 'Home';
require_once __DIR__ . '/config/app.php';
require_once __DIR__ . '/includes/header.php';
?>

<main>
  <!-- Hero Section with Authentic Passu Cones Panorama -->
  <section class="hero-section" style="background-image: url('assets/images/hero/hero-pakistan.jpg');">
    <div class="hero-overlay"></div>
    <div class="hero-content">
      <span class="eyebrow">Hey Travelers</span>
      <h1>Welcome to Discover Pakistan</h1>
      <p class="lead-text">
        Your one-stop travel agency for unforgettable Pakistan tour packages, private journeys, and weekly group departures.
      </p>
      
      <div class="hero-actions">
        <a href="pages/destinations.php" class="btn btn-primary btn-lg">Explore Tour Packages</a>
        <a href="pages/customize-tour.php" class="btn btn-outline btn-lg">Customize My Tour</a>
      </div>

      <form class="hero-finder" action="pages/tours.php" method="get">
        <div class="hero-finder-field"><label for="heroDestination">Destination</label><select id="heroDestination" name="destination"><option value="">Where do you want to go?</option><option>Hunza Valley</option><option>Skardu Valley</option><option>Swat & Kalam</option><option>Neelum Valley</option></select></div>
        <div class="hero-finder-field"><label for="heroDuration">Trip Type</label><select id="heroDuration" name="type"><option value="">Private or group?</option><option>Private Customized Tour</option><option>Public Group Tour</option><option>Family Tour</option><option>Honeymoon Tour</option></select></div>
        <div class="hero-finder-field"><label for="heroDate">Travel Date</label><input id="heroDate" type="date" name="date" /></div>
        <button class="btn btn-primary" type="submit">Find My Trip</button>
      </form>

      <div class="hero-stats">
        <div class="stat-item">
          <span class="stat-number">2,400m+</span>
          <span class="stat-label">Alpine Elevations</span>
        </div>
        <div class="stat-item">
          <span class="stat-number">100%</span>
          <span class="stat-label">Flexible Cancellation</span>
        </div>
        <div class="stat-item">
          <span class="stat-number">4.9/5</span>
          <span class="stat-label">Verified Client Rating</span>
        </div>
        <div class="stat-item">
          <span class="stat-number">25%</span>
          <span class="stat-label">Deposit To Book</span>
        </div>
      </div>
    </div>
  </section>

  <div class="page-shell">
    <!-- Flexibility Banner -->
    <div style="background: rgba(16, 185, 129, 0.08); border: 1px solid rgba(16, 185, 129, 0.25); border-radius: var(--radius-md); padding: 1.25rem 2rem; margin: 2rem 0; display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center; gap: 1.5rem;">
      <div style="display: flex; align-items: center; gap: 1rem;">
        <div style="font-size: 2rem; background: rgba(16, 185, 129, 0.2); width: 50px; height: 50px; border-radius: 50%; display: flex; align-items: center; justify-content: center;"><svg class="ui-icon" aria-hidden="true" viewBox="0 0 24 24"><path d="M12 3 20 6v5c0 5.2-3.4 8.7-8 10-4.6-1.3-8-4.8-8-10V6l8-3Z"/><path d="m8.5 12 2.2 2.2 4.8-5"/></svg></div>
        <div>
          <h4 style="color: var(--emerald-primary); margin-bottom: 0.2rem; font-size: 1.1rem;">Discover Pakistan Flexibility Guarantee</h4>
          <p style="font-size: 0.88rem; color: var(--text-light); margin: 0;">Free date changes & cancellation up to 7 days before departure. Instant weather re-routing for mountain flights.</p>
        </div>
      </div>
      <div style="display: flex; gap: 0.75rem; flex-wrap: wrap;">
        <span class="tag-pill" style="border-color: var(--emerald-primary); color: var(--emerald-primary);">✓ 25% Deposit Only</span>
        <span class="tag-pill" style="border-color: var(--gold-accent); color: var(--gold-accent);">✓ Private 4x4 Prado Option</span>
        <span class="tag-pill" style="border-color: var(--text-light); color: var(--text-light);">✓ Tailor-Made Itineraries</span>
      </div>
    </div>

    <!-- Featured Destinations Section -->
    <section class="section">
      <div class="section-heading">
        <span class="eyebrow">Curated Real Destinations</span>
        <h2>Explore Handcrafted Regional Landscapes</h2>
        <p>Verified authentic photography, exact elevations, and seasonal dossiers across Pakistan.</p>
      </div>

      <div class="cards-grid">
        <?php foreach (array_slice($featuredDestinations, 0, 4) as $dest): ?>
          <article class="card" data-category="<?= htmlspecialchars($dest['category']) ?>">
            <div class="card-media">
              <span class="card-badge"><?= htmlspecialchars($dest['tag']) ?></span>
              <img src="<?= htmlspecialchars($dest['image']) ?>" alt="<?= htmlspecialchars($dest['title']) ?>" loading="lazy" />
            </div>
            <div class="card-body">
              <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.4rem;">
                <span style="font-size: 0.8rem; color: var(--gold-accent); font-weight: 600;"><?= htmlspecialchars($dest['province']) ?> • <?= htmlspecialchars($dest['altitude'] ?? '') ?></span>
                <span style="font-size: 0.8rem; color: var(--text-muted);">★ <?= $dest['rating'] ?> (<?= $dest['reviews_count'] ?>)</span>
              </div>
              <h3><?= htmlspecialchars($dest['title']) ?></h3>
              <p><?= htmlspecialchars($dest['excerpt']) ?></p>
              <div style="margin: 0.75rem 0 1rem; font-size: 0.82rem; color: var(--text-light);">
                <span style="color: var(--emerald-primary); font-weight: 600;">Best Season:</span> <?= htmlspecialchars($dest['best_time']) ?>
              </div>
              <div class="card-footer">
                <a href="pages/destination-detail.php?id=<?= $dest['id'] ?>" class="text-link">
                  Detailed Travel Dossier
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                  </svg>
                </a>
              </div>
            </div>
          </article>
        <?php endforeach; ?>
      </div>

      <div style="text-align: center; margin-top: 2.5rem;">
        <a href="pages/destinations.php" class="btn btn-outline">View All 6 Destinations &rarr;</a>
      </div>
    </section>

    <section class="nh-split-banner">
      <div class="nh-image-holder">
        <img src="assets/images/tours/tour-hunza.jpg" alt="Couple enjoying a Hunza tour" loading="lazy" />
        <div class="nh-call-badge"><div class="icon-ring">☎</div><div><span style="display: block; font-size: 0.75rem; color: var(--text-muted);">Talk to a tour designer</span><strong style="font-size: 1.1rem; color: #fff;"><?= htmlspecialchars($sitePhoneFormatted) ?></strong></div></div>
      </div>
      <div>
        <span class="eyebrow">Family & Honeymoon Packages</span>
        <h2>Travel Comfortably, Explore Deeply</h2>
        <p style="color: var(--text-muted);">From a quiet honeymoon escape to a multigenerational mountain holiday, every detail is planned around your people and your pace.</p>
        <ul class="nh-perks-list">
          <li class="nh-perk-item"><span class="icon-check">✓</span> Quality 3, 4 & 5-star stays</li>
          <li class="nh-perk-item"><span class="icon-check">✓</span> Dedicated personal driver</li>
          <li class="nh-perk-item"><span class="icon-check">✓</span> Domestic flight reservations</li>
          <li class="nh-perk-item"><span class="icon-check">✓</span> 4x4 jeep safaris</li>
          <li class="nh-perk-item"><span class="icon-check">✓</span> Traditional local meals</li>
          <li class="nh-perk-item"><span class="icon-check">✓</span> Bonfire & BBQ evenings</li>
        </ul>
        <a href="pages/customize-tour.php" class="btn btn-primary">Get Your Free Quote</a>
      </div>
    </section>

    <section class="section">
      <div class="section-heading text-center"><span class="eyebrow">Simple Planning</span><h2>How to Book a Trip?</h2></div>
      <div class="nh-steps-grid">
        <div class="nh-step-box"><span class="nh-step-badge">01</span><span class="nh-step-icon">01</span><h3>Find a Destination</h3><p>Browse the regions and routes currently available.</p></div>
        <div class="nh-step-box"><span class="nh-step-badge">02</span><span class="nh-step-icon">02</span><h3>Pick Your Tour</h3><p>Choose the itinerary and comfort level that suits you.</p></div>
        <div class="nh-step-box"><span class="nh-step-badge">03</span><span class="nh-step-icon">03</span><h3>Contact Us</h3><p>Speak directly with our trip planning team.</p></div>
        <div class="nh-step-box"><span class="nh-step-badge">04</span><span class="nh-step-icon">04</span><h3>Go & Explore</h3><p>Arrive prepared and enjoy the journey.</p></div>
      </div>
    </section>

    <!-- Why Choose Us Features -->
    <section class="alternate-section">
      <div class="section-heading text-center">
        <span class="eyebrow">The Discover Pakistan Standard</span>
        <h2>Why Discerning Travelers Choose Us</h2>
        <p>We redefine exploration in Pakistan with personalized concierge service, seasoned local guides, and flexible booking security.</p>
      </div>

      <div class="features-grid">
        <div class="feature-card">
          <div class="feature-icon">🛡️</div>
          <h3>100% Flexible Booking</h3>
          <p>Modify dates or cancel free up to 7 days before departure. If alpine weather blocks mountain flights, our concierge provides instant alternate routing.</p>
        </div>
        <div class="feature-card">
          <div class="feature-icon">🏔️</div>
          <h3>Private 4x4 Prado Expeditions</h3>
          <p>Traverse the Karakoram Highway and high mountain passes in premium heated 4x4 vehicles with seasoned alpine drivers.</p>
        </div>
        <div class="feature-card">
          <div class="feature-icon">🏰</div>
          <h3>Heritage Forts & Luxury Stays</h3>
          <p>Sleep in centuries-old restored royal palaces, luxury lakefront chalets, and international 5-star executive suites.</p>
        </div>
        <div class="feature-card">
          <div class="feature-icon">✨</div>
          <h3>Customizable Travel Tiers</h3>
          <p>Choose between Luxury Classic, Signature VIP (with personal drone videographer & private V8), or high-altitude Trekker editions.</p>
        </div>
      </div>
    </section>

    <!-- Signature Tours Preview -->
    <section class="section">
      <div class="section-heading">
        <span class="eyebrow">Signature Tour Packages</span>
        <h2>Featured Curated Tour Experiences</h2>
        <p>All-inclusive guided itineraries with 25% deposit protection and private departure flexibility.</p>
      </div>

      <div class="cards-grid-3">
        <?php foreach (array_slice($featuredTours, 0, 3) as $tour): ?>
          <article class="card">
            <div class="card-media">
              <span class="card-badge"><?= htmlspecialchars($tour['duration']) ?></span>
              <img src="<?= htmlspecialchars($tour['image']) ?>" alt="<?= htmlspecialchars($tour['title']) ?>" loading="lazy" />
            </div>
            <div class="card-body">
              <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.35rem;">
                <span style="font-size: 0.78rem; color: var(--gold-accent); font-weight: 600; text-transform: uppercase;"><?= htmlspecialchars($tour['badge'] ?? 'Tour') ?></span>
                <span style="font-size: 0.8rem; color: var(--text-muted);">★ <?= $tour['rating'] ?></span>
              </div>
              <h3><?= htmlspecialchars($tour['title']) ?></h3>
              <ul style="list-style: none; margin: 0.75rem 0 1rem; font-size: 0.85rem; color: var(--text-light);">
                <?php foreach ($tour['included'] as $perk): ?>
                  <li style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.35rem;">
                    <span style="color: var(--emerald-primary);">✓</span> <?= htmlspecialchars($perk) ?>
                  </li>
                <?php endforeach; ?>
              </ul>
              <?php if (isset($tour['flexibility']['cancel'])): ?>
                <div style="background: rgba(16,185,129,0.06); padding: 0.5rem 0.75rem; border-radius: var(--radius-sm); font-size: 0.78rem; color: var(--emerald-primary); margin-bottom: 1rem; border-left: 3px solid var(--emerald-primary);">
                  <?= htmlspecialchars($tour['flexibility']['cancel']) ?>
                </div>
              <?php endif; ?>
              <div class="card-footer">
                <div>
                  <span class="price-period">Starting from</span>
                  <div class="price-tag"><?= htmlspecialchars($tour['price']) ?></div>
                </div>
                <button class="btn btn-primary btn-sm btn-book-trigger" data-title="<?= htmlspecialchars($tour['title']) ?>" data-price="175000">Reserve Trip</button>
              </div>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </section>

    <!-- Testimonials Section -->
    <section class="section">
      <div class="section-heading text-center">
        <span class="eyebrow">Traveler Stories</span>
        <h2>Voices of Our Explorers</h2>
      </div>

      <div class="features-grid">
        <div class="feature-card">
          <div style="color: var(--gold-accent); font-size: 1.1rem; margin-bottom: 0.75rem;">★★★★★</div>
          <p style="font-style: italic; margin-bottom: 1.25rem;">"Our 8-day tour of Hunza and Skardu was simply world-class. From the views at Serena Hunza to crossing the Attabad Lake, everything was flawless. The weather reschedule guarantee gave us complete peace of mind."</p>
          <div>
            <strong style="display: block; font-size: 0.95rem;">Dr. Ayesha & Salman Khan</strong>
            <span style="font-size: 0.8rem; color: var(--text-muted);">Dubai, UAE • Northern Expedition</span>
          </div>
        </div>

        <div class="feature-card">
          <div style="color: var(--gold-accent); font-size: 1.1rem; margin-bottom: 0.75rem;">★★★★★</div>
          <p style="font-style: italic; margin-bottom: 1.25rem;">"The culinary walking tour in Old Lahore paired with the heritage stay at Haveli was one of the greatest travel experiences of my life."</p>
          <div>
            <strong style="display: block; font-size: 0.95rem;">Marcus Vance</strong>
            <span style="font-size: 0.8rem; color: var(--text-muted);">London, UK • Mughal Heritage Trail</span>
          </div>
        </div>

        <div class="feature-card">
          <div style="color: var(--gold-accent); font-size: 1.1rem; margin-bottom: 0.75rem;">★★★★★</div>
          <p style="font-style: italic; margin-bottom: 1.25rem;">"Driving through Hingol National Park and watching the sunset at Kund Malir Golden Beach is something every traveler must experience."</p>
          <div>
            <strong style="display: block; font-size: 0.95rem;">Zainab Al-Husseini</strong>
            <span style="font-size: 0.8rem; color: var(--text-muted);">Karachi, Pakistan • Coastal Safari</span>
          </div>
        </div>
      </div>
    </section>
  </div>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
