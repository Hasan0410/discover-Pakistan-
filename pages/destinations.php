<?php
session_start();
$pageTitle = 'Destinations Catalog';
require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../includes/header.php';
?>

<main class="page-shell">
  <section class="section">
    <div class="section-heading">
      <span class="eyebrow">Discover Pakistan Destinations</span>
      <h2>Explore Iconic Regions & Hidden Paradises</h2>
      <p>Filter by geography or search by name to discover high-altitude peaks, alpine valleys, heritage sanctuaries, and coastal beaches with verified authentic photography.</p>
    </div>

    <!-- Filter & Search Toolbar -->
    <div class="filter-bar">
      <div class="filter-pills">
        <button class="filter-btn active" data-filter="all">All Regions</button>
        <button class="filter-btn" data-filter="mountains">Mountains & Glaciers</button>
        <button class="filter-btn" data-filter="valleys">Alpine Valleys</button>
        <button class="filter-btn" data-filter="heritage">Heritage & Mughal</button>
        <button class="filter-btn" data-filter="coastal">Arabian Coastline</button>
      </div>

      <div class="search-input-wrap">
        <svg class="search-icon-svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <circle cx="11" cy="11" r="8"></circle>
          <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
        </svg>
        <input type="text" class="search-input" placeholder="Search destination, altitude, province..." aria-label="Search destinations" />
      </div>
    </div>

    <!-- Destinations Grid -->
    <div class="cards-grid">
      <?php foreach ($featuredDestinations as $dest): ?>
        <article class="card" data-category="<?= htmlspecialchars($dest['category']) ?>">
          <div class="card-media">
            <span class="card-badge"><?= htmlspecialchars($dest['tag']) ?></span>
            <img src="../<?= htmlspecialchars($dest['image']) ?>" alt="<?= htmlspecialchars($dest['title']) ?>" loading="lazy" />
          </div>
          <div class="card-body">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.5rem;">
              <span style="font-size: 0.8rem; color: var(--gold-accent); font-weight: 600; text-transform: uppercase;"><?= htmlspecialchars($dest['province']) ?></span>
              <span style="font-size: 0.82rem; color: var(--text-muted);">★ <?= $dest['rating'] ?> (<?= $dest['reviews_count'] ?> reviews)</span>
            </div>
            <h3><?= htmlspecialchars($dest['title']) ?></h3>
            <p><?= htmlspecialchars($dest['excerpt']) ?></p>
            
            <div style="margin-bottom: 1.25rem;">
              <div style="font-size: 0.82rem; color: var(--text-light); margin-bottom: 0.35rem;">
                <strong>Elevation:</strong> <span style="color: var(--gold-light);"><?= htmlspecialchars($dest['altitude'] ?? '') ?></span>
              </div>
              <div style="font-size: 0.82rem; color: var(--text-light); margin-bottom: 0.5rem;">
                <strong>Best Season:</strong> <?= htmlspecialchars($dest['best_time']) ?>
              </div>
              <div style="display: flex; flex-wrap: wrap; gap: 0.35rem; margin-bottom: 0.5rem;">
                <?php foreach (array_slice($dest['highlights'], 0, 2) as $h): ?>
                  <span style="font-size: 0.75rem; background: rgba(255,255,255,0.06); padding: 0.2rem 0.6rem; border-radius: var(--radius-full); border: 1px solid var(--border-subtle);"><?= htmlspecialchars($h) ?></span>
                <?php endforeach; ?>
              </div>
              <?php if (!empty($dest['flexibility'])): ?>
                <div style="font-size: 0.75rem; color: var(--emerald-primary); background: rgba(16,185,129,0.06); padding: 0.35rem 0.6rem; border-radius: var(--radius-sm); border-left: 2px solid var(--emerald-primary);">
                  🛡️ <?= htmlspecialchars($dest['flexibility'][0]) ?>
                </div>
              <?php endif; ?>
            </div>

            <div class="card-footer">
              <a href="destination-detail.php?id=<?= $dest['id'] ?>" class="text-link">
                View Travel Guide
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <line x1="5" y1="12" x2="19" y2="12"></line>
                  <polyline points="12 5 19 12 12 19"></polyline>
                </svg>
              </a>
              <button class="btn btn-outline btn-sm btn-book-trigger" data-title="Tour to <?= htmlspecialchars($dest['title']) ?>" data-price="95000">Inquire</button>
            </div>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
