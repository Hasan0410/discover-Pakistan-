<?php
session_start();
$pageTitle = 'Signature Tour Packages';
require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../includes/header.php';

$allTours = $featuredTours;
?>

<main class="page-shell">
  <section class="section">
    <div class="section-heading">
      <span class="eyebrow">Signature Curated Journeys</span>
      <h2>Handcrafted Tour Packages Across Pakistan</h2>
      <p>All-inclusive bespoke travel itineraries with private 4x4 transfers, verified luxury accommodations, authentic local photography, and 100% flexible booking guarantees.</p>
    </div>

    <!-- Flexibility Highlights Ribbon -->
    <div style="background: rgba(16, 185, 129, 0.08); border: 1px solid rgba(16, 185, 129, 0.25); border-radius: var(--radius-md); padding: 1rem 1.5rem; margin-bottom: 2rem; display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center; gap: 1rem;">
      <div style="display: flex; align-items: center; gap: 0.75rem;">
        <span style="font-size: 1.5rem;">🛡️</span>
        <span style="font-size: 0.9rem; color: var(--text-light);"><strong>Book With Peace of Mind:</strong> Free cancellation up to 7 days, 25% deposit only, and automatic weather flight protection.</span>
      </div>
      <div style="display: flex; gap: 0.5rem;">
        <span class="tag-pill" style="font-size: 0.72rem; border-color: var(--emerald-primary); color: var(--emerald-primary);">Private 4x4 Prado</span>
        <span class="tag-pill" style="font-size: 0.72rem; border-color: var(--gold-accent); color: var(--gold-accent);">VIP Tier Options</span>
        <span class="tag-pill" style="font-size: 0.72rem; border-color: var(--text-light); color: var(--text-light);">Custom Add-ons</span>
      </div>
    </div>

    <!-- Filter & Search Toolbar -->
    <div class="filter-bar">
      <div class="filter-pills">
        <button class="filter-btn active" data-filter="all">All Packages</button>
        <button class="filter-btn" data-filter="mountains">Mountain Expeditions</button>
        <button class="filter-btn" data-filter="heritage">Heritage & Culture</button>
        <button class="filter-btn" data-filter="coastal">Coastal Safaris</button>
        <button class="filter-btn" data-filter="valleys">Valley Getaways</button>
      </div>

      <div class="search-input-wrap">
        <svg class="search-icon-svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <circle cx="11" cy="11" r="8"></circle>
          <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
        </svg>
        <input type="text" class="search-input" placeholder="Search tours by name, duration, vehicle..." aria-label="Search tours" />
      </div>
    </div>

    <!-- Tours Grid -->
    <div class="cards-grid-3">
      <?php foreach ($allTours as $tour): ?>
        <article class="card" data-category="<?= htmlspecialchars($tour['category']) ?>">
          <div class="card-media">
            <span class="card-badge"><?= htmlspecialchars($tour['duration']) ?></span>
            <img src="../<?= htmlspecialchars($tour['image']) ?>" alt="<?= htmlspecialchars($tour['title']) ?>" loading="lazy" />
          </div>
          <div class="card-body">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.5rem;">
              <span style="font-size: 0.78rem; color: var(--gold-accent); font-weight: 600; text-transform: uppercase;"><?= htmlspecialchars($tour['badge'] ?? 'Signature Tour') ?></span>
              <span style="font-size: 0.82rem; color: var(--text-muted);">★ <?= $tour['rating'] ?></span>
            </div>
            <h3><?= htmlspecialchars($tour['title']) ?></h3>
            <ul style="list-style: none; margin: 0.75rem 0 1rem; font-size: 0.88rem; color: var(--text-light);">
              <?php foreach ($tour['included'] as $perk): ?>
                <li style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.35rem;">
                  <span style="color: var(--emerald-primary);">✓</span> <?= htmlspecialchars($perk) ?>
                </li>
              <?php endforeach; ?>
            </ul>

            <!-- Flexibility Guarantee Chip -->
            <div style="background: rgba(16,185,129,0.06); padding: 0.5rem 0.75rem; border-radius: var(--radius-sm); font-size: 0.78rem; color: var(--emerald-primary); margin-bottom: 1rem; border-left: 3px solid var(--emerald-primary);">
              🛡️ <?= htmlspecialchars($tour['flexibility']['cancel'] ?? 'Free cancellation up to 7 days') ?>
            </div>

            <div class="card-footer">
              <div>
                <span class="price-period">All-inclusive from</span>
                <div class="price-tag"><?= htmlspecialchars($tour['price']) ?></div>
              </div>
              <?php 
                $cleanPrice = preg_replace('/[^0-9]/', '', $tour['price']); 
              ?>
              <button class="btn btn-primary btn-sm btn-book-trigger" data-title="<?= htmlspecialchars($tour['title']) ?>" data-price="<?= $cleanPrice ?>">Configure Trip</button>
            </div>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
