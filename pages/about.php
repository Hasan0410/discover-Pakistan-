<?php
session_start();
$pageTitle = 'About Us - Discover Pakistan';
require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../includes/header.php';
?>

<main class="page-shell">
  <section class="section">
    <div class="section-heading">
      <span class="eyebrow">Our Story & Mission</span>
      <h2>Redefining Travel Across Pakistan</h2>
      <p>Discover Pakistan was established to celebrate the astonishing natural wonders, rich historical heritage, and world-renowned hospitality of Pakistan with an unwavering dedication to luxury, safety, and sustainable tourism.</p>
    </div>

    <!-- Stats Grid -->
    <div class="hero-stats" style="margin-bottom: 4rem;">
      <div class="stat-item">
        <span class="stat-number">50+</span>
        <span class="stat-label">Handcrafted Destinations</span>
      </div>
      <div class="stat-item">
        <span class="stat-number">10k+</span>
        <span class="stat-label">Global Travelers Served</span>
      </div>
      <div class="stat-item">
        <span class="stat-number">99.4%</span>
        <span class="stat-label">Client Satisfaction</span>
      </div>
      <div class="stat-item">
        <span class="stat-number">120+</span>
        <span class="stat-label">Verified Luxury Partners</span>
      </div>
    </div>

    <!-- Core Values -->
    <div class="features-grid" style="margin-bottom: 4rem;">
      <div class="feature-card">
        <div class="feature-icon">🌿</div>
        <h3>Eco-Conscious & Sustainable</h3>
        <p>We work directly with mountain communities in Gilgit-Baltistan and Khyber Pakhtunkhwa to ensure tourism revenue directly supports local education, healthcare, and reforestation.</p>
      </div>

      <div class="feature-card">
        <div class="feature-icon">🛡️</div>
        <h3>Gold-Standard Safety</h3>
        <p>Every mountain expedition is backed by experienced certified high-altitude drivers, satellite communication gear, 24/7 medical rescue insurance coordination, and heated 4x4 vehicles.</p>
      </div>

      <div class="feature-card">
        <div class="feature-icon">⭐</div>
        <h3>White-Glove Concierge</h3>
        <p>From private charter flights to bespoke culinary tasting menus in historic havelis, our dedicated travel architects handle every detail of your journey.</p>
      </div>
    </div>

    <!-- Leadership Team with Real Photos -->
    <div class="section-heading">
      <span class="eyebrow">Leadership & Expedition Architects</span>
      <h2>Meet Our Team</h2>
    </div>

    <div class="cards-grid-3">
      <article class="card">
        <div class="card-media">
          <img src="<?php echo getAssetUrl('images/team/team-zainab.jpg'); ?>" alt="Zainab Tariq - Founder & CEO" />
        </div>
        <div class="card-body">
          <h3>Zainab Tariq</h3>
          <span style="font-size: 0.85rem; color: var(--gold-accent); margin-bottom: 0.75rem; font-weight: 600;">Founder & CEO</span>
          <p style="font-size: 0.9rem;">Former tourism consultant with 12+ years pioneering luxury bespoke expeditions across Karakoram and Hindukush ranges.</p>
        </div>
      </article>

      <article class="card">
        <div class="card-media">
          <img src="<?php echo getAssetUrl('images/team/team-kamran.jpg'); ?>" alt="Kamran Baig - Head of Alpine Logistics" />
        </div>
        <div class="card-body">
          <h3>Kamran Baig</h3>
          <span style="font-size: 0.85rem; color: var(--gold-accent); margin-bottom: 0.75rem; font-weight: 600;">Head of Alpine Logistics</span>
          <p style="font-size: 0.9rem;">Native of Hunza Valley with extensive experience managing high-altitude safaris and private expedition operations.</p>
        </div>
      </article>

      <article class="card">
        <div class="card-media">
          <img src="<?php echo getAssetUrl('images/team/team-amina.jpg'); ?>" alt="Amina Siddiqui - Director of Heritage & Culture" />
        </div>
        <div class="card-body">
          <h3>Amina Siddiqui</h3>
          <span style="font-size: 0.85rem; color: var(--gold-accent); margin-bottom: 0.75rem; font-weight: 600;">Director of Heritage & Culture</span>
          <p style="font-size: 0.9rem;">Architectural historian specializing in Mughal monuments, ancient Gandhara civilization, and culinary trails.</p>
        </div>
      </article>
    </div>

    <!-- Flexibility Pledge Banner -->
    <div style="margin-top: 5rem; background: linear-gradient(135deg, rgba(15, 42, 30, 0.95), rgba(8, 22, 16, 0.98)); border: 1px solid rgba(212, 163, 89, 0.35); border-radius: 20px; padding: 3rem 2.5rem; text-align: center; position: relative; overflow: hidden;">
      <div style="position: absolute; top: -50px; right: -50px; width: 150px; height: 150px; background: radial-gradient(circle, rgba(212, 163, 89, 0.2) 0%, transparent 70%); border-radius: 50%;"></div>
      <span class="eyebrow" style="color: var(--gold-accent); font-weight: 700; letter-spacing: 0.15em; text-transform: uppercase; font-size: 0.85rem;">Peace of Mind Booking Pledge</span>
      <h2 style="font-family: var(--font-heading); color: #fff; font-size: 2.2rem; margin: 0.75rem 0 1rem;">100% Risk-Free Travel Flexibility</h2>
      <p style="max-width: 760px; margin: 0 auto 2rem; color: rgba(255, 255, 255, 0.85); font-size: 1.05rem; line-height: 1.7;">
        We understand that alpine weather and international flights require agility. Every expedition booked with Discover Pakistan comes with our industry-leading guarantee: <strong>Lock your dates with just a 25% deposit</strong>, enjoy <strong>free cancellations up to 7 days prior</strong>, and benefit from <strong>lifetime weather-guaranteed date reschedules</strong> with zero penalty fees.
      </p>
      <div style="display: flex; justify-content: center; gap: 1.5rem; flex-wrap: wrap;">
        <a href="tours.php" class="btn btn-primary" style="padding: 0.9rem 2rem; font-weight: 600;">Explore Flexible Packages</a>
        <a href="contact.php" class="btn btn-outline" style="padding: 0.9rem 2rem; font-weight: 600; color: #fff; border-color: rgba(255,255,255,0.4);">Speak with an Expedition Specialist</a>
      </div>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
