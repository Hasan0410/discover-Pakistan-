<?php
session_start();
require_once __DIR__ . '/../config/app.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 1;
$destination = null;
foreach ($featuredDestinations as $d) {
    if ($d['id'] === $id) {
        $destination = $d;
        break;
    }
}
if (!$destination) {
    $destination = $featuredDestinations[0];
}

$pageTitle = $destination['title'] . ' Travel Dossier';
require_once __DIR__ . '/../includes/header.php';

$imgSrc = (strpos($destination['image'], 'http') === 0) ? $destination['image'] : '../' . ltrim($destination['image'], './');
?>

<main class="page-shell">
  <!-- Breadcrumb Navigation -->
  <nav style="margin-bottom: 1.5rem; font-size: 0.88rem; color: var(--text-muted);">
    <a href="../index.php" style="color: var(--text-light);">Home</a> / 
    <a href="destinations.php" style="color: var(--text-light);">Destinations</a> / 
    <span style="color: var(--gold-accent);"><?= htmlspecialchars($destination['title']) ?></span>
  </nav>

  <!-- Destination Hero Header with Real Photo -->
  <div style="position: relative; border-radius: var(--radius-lg); overflow: hidden; margin-bottom: 3rem; border: 1px solid var(--border-subtle); box-shadow: var(--shadow-lg);">
    <div style="height: 440px; background: url('<?= htmlspecialchars($imgSrc) ?>') center/cover no-repeat; position: relative;">
      <div style="position: absolute; inset: 0; background: linear-gradient(180deg, rgba(7, 21, 16, 0.2) 0%, rgba(7, 21, 16, 0.85) 85%, var(--bg-dark) 100%);"></div>
      <div style="position: absolute; bottom: 2rem; left: 2rem; right: 2rem; z-index: 2;">
        <span class="eyebrow"><?= htmlspecialchars($destination['tag']) ?> • <?= htmlspecialchars($destination['province']) ?></span>
        <h1 style="font-family: var(--font-heading); font-size: clamp(2rem, 4vw, 3.2rem); margin-bottom: 0.75rem;"><?= htmlspecialchars($destination['title']) ?></h1>
        <p style="color: var(--text-light); max-width: 750px; font-size: 1.05rem;"><?= htmlspecialchars($destination['excerpt']) ?></p>
      </div>
    </div>
  </div>

  <!-- Main Content & Details Grid -->
  <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 2.5rem; margin-bottom: 4rem;">
    <div>
      <!-- Essential Travel Info -->
      <section style="background: var(--bg-card); border: 1px solid var(--border-subtle); border-radius: var(--radius-md); padding: 2rem; margin-bottom: 2rem;">
        <h2 style="font-family: var(--font-heading); font-size: 1.5rem; margin-bottom: 1rem;">Experience & Highlights</h2>
        <p style="color: var(--text-light); margin-bottom: 1.5rem; line-height: 1.7;">
          <?= htmlspecialchars($destination['title']) ?> stands among the most mesmerizing travel jewels in Pakistan. Known for warm local hospitality, breathtaking high-altitude geography, and centuries-old Silk Road heritage, this region welcomes both luxury seekers and intrepid adventurers.
        </p>
        
        <h3 style="font-size: 1.1rem; color: var(--gold-light); margin-bottom: 0.75rem;">Key Attractions & Landmarks</h3>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; margin-bottom: 1.5rem;">
          <?php foreach ($destination['highlights'] as $hl): ?>
            <div style="background: rgba(255,255,255,0.04); border: 1px solid var(--border-subtle); padding: 0.85rem 1rem; border-radius: var(--radius-sm); display: flex; align-items: center; gap: 0.5rem;">
              <span style="color: var(--emerald-primary);">✦</span>
              <span style="font-size: 0.9rem; font-weight: 500;"><?= htmlspecialchars($hl) ?></span>
            </div>
          <?php endforeach; ?>
        </div>

        <?php if (!empty($destination['flexibility'])): ?>
          <div style="background: rgba(16, 185, 129, 0.08); border: 1px solid rgba(16, 185, 129, 0.25); border-radius: var(--radius-sm); padding: 1rem; margin-top: 1.5rem;">
            <h4 style="color: var(--emerald-primary); margin-bottom: 0.5rem; font-size: 0.95rem;">🛡️ Flexibility Guarantees For This Region:</h4>
            <ul style="margin: 0; padding-left: 1.25rem; font-size: 0.85rem; color: var(--text-light);">
              <?php foreach ($destination['flexibility'] as $f): ?>
                <li style="margin-bottom: 0.25rem;"><?= htmlspecialchars($f) ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>
      </section>

      <!-- Suggested 4-Day Itinerary -->
      <section style="background: var(--bg-card); border: 1px solid var(--border-subtle); border-radius: var(--radius-md); padding: 2rem; margin-bottom: 2rem;">
        <h2 style="font-family: var(--font-heading); font-size: 1.5rem; margin-bottom: 1.5rem;">Curated 4-Day Itinerary</h2>
        
        <div style="display: flex; flex-direction: column; gap: 1.25rem;">
          <div style="border-left: 3px solid var(--emerald-primary); padding-left: 1.25rem;">
            <span style="font-size: 0.8rem; font-weight: 700; color: var(--emerald-primary); text-transform: uppercase;">Day 1: Arrival & Valley Overview</span>
            <h4 style="margin: 0.25rem 0 0.5rem;">Chauffeured Transfer & Sunset Viewpoint</h4>
            <p style="font-size: 0.9rem; color: var(--text-muted);">Check in at your luxury resort, relax with traditional herbal chai, and enjoy sunset photography at panoramic eagle viewpoints.</p>
          </div>

          <div style="border-left: 3px solid var(--gold-accent); padding-left: 1.25rem;">
            <span style="font-size: 0.8rem; font-weight: 700; color: var(--gold-accent); text-transform: uppercase;">Day 2: Ancient Forts & Local Culture</span>
            <h4 style="margin: 0.25rem 0 0.5rem;">Heritage Fort Exploration & Artisan Markets</h4>
            <p style="font-size: 0.9rem; color: var(--text-muted);">Guided private tour of restored historical forts, interaction with local walnut woodcrafters, and dinner with traditional cuisine.</p>
          </div>

          <div style="border-left: 3px solid var(--sky-accent); padding-left: 1.25rem;">
            <span style="font-size: 0.8rem; font-weight: 700; color: var(--sky-accent); text-transform: uppercase;">Day 3: High-Altitude Lakes & Expeditions</span>
            <h4 style="margin: 0.25rem 0 0.5rem;">4x4 Safari & Turquoise Lake Boating</h4>
            <p style="font-size: 0.9rem; color: var(--text-muted);">Cruise across glacial waters, traverse suspension bridges, and hike to glacier viewpoint trails with packed gourmet lunch.</p>
          </div>

          <div style="border-left: 3px solid var(--border-subtle); padding-left: 1.25rem;">
            <span style="font-size: 0.8rem; font-weight: 700; color: var(--text-light); text-transform: uppercase;">Day 4: Souvenirs & Departure</span>
            <h4 style="margin: 0.25rem 0 0.5rem;">Organic Fruit Orchards & Airport Transfer</h4>
            <p style="font-size: 0.9rem; color: var(--text-muted);">Morning stroll through apricot and cherry groves, purchase authentic dried fruits and gemstones, followed by escorted VIP transfer.</p>
          </div>
        </div>
      </section>

      <!-- Traveler Reviews -->
      <section style="background: var(--bg-card); border: 1px solid var(--border-subtle); border-radius: var(--radius-md); padding: 2rem;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
          <h2 style="font-family: var(--font-heading); font-size: 1.5rem;">Verified Traveler Reviews</h2>
          <span style="color: var(--gold-accent); font-weight: 700;">★ <?= $destination['rating'] ?> / 5.0 (<?= $destination['reviews_count'] ?>)</span>
        </div>

        <div style="display: flex; flex-direction: column; gap: 1rem;">
          <div style="background: rgba(255,255,255,0.03); border: 1px solid var(--border-subtle); padding: 1.25rem; border-radius: var(--radius-sm);">
            <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
              <strong>Farhan Qureshi</strong>
              <span style="color: var(--gold-accent);">★★★★★</span>
            </div>
            <p style="font-size: 0.9rem; color: var(--text-light);">"Traveling to <?= htmlspecialchars($destination['title']) ?> with Discover Pakistan exceeded all expectations. The logistics were smooth, the private 4x4 was immaculate, and the stays were luxurious."</p>
          </div>
        </div>
      </section>
    </div>

    <!-- Sidebar Booking & Quick Facts -->
    <aside>
      <div style="background: var(--bg-card); border: 1px solid var(--border-highlight); border-radius: var(--radius-md); padding: 2rem; position: sticky; top: 100px; box-shadow: var(--shadow-md);">
        <span class="eyebrow" style="margin-bottom: 0.5rem;">Trip Planner</span>
        <h3 style="font-family: var(--font-heading); font-size: 1.5rem; margin-bottom: 1rem;">Book Custom Tour</h3>
        
        <div style="border-bottom: 1px solid var(--border-subtle); padding-bottom: 1rem; margin-bottom: 1.25rem;">
          <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem; font-size: 0.9rem;">
            <span style="color: var(--text-muted);">Elevation:</span>
            <strong><?= htmlspecialchars($destination['altitude'] ?? 'Scenic Elevation') ?></strong>
          </div>
          <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem; font-size: 0.9rem;">
            <span style="color: var(--text-muted);">Airport Access:</span>
            <strong style="font-size: 0.8rem; text-align: right; max-width: 160px;"><?= htmlspecialchars($destination['airport'] ?? 'Direct Access') ?></strong>
          </div>
          <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem; font-size: 0.9rem;">
            <span style="color: var(--text-muted);">Best Season:</span>
            <strong><?= htmlspecialchars($destination['best_time']) ?></strong>
          </div>
          <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem; font-size: 0.9rem;">
            <span style="color: var(--text-muted);">Weather:</span>
            <strong style="font-size: 0.8rem; text-align: right;"><?= htmlspecialchars($destination['weather'] ?? 'Mild Alpine') ?></strong>
          </div>
          <div style="display: flex; justify-content: space-between; font-size: 0.9rem; margin-top: 0.5rem;">
            <span style="color: var(--text-muted);">Tour Estimate:</span>
            <strong style="color: var(--gold-light);">From PKR 95,000</strong>
          </div>
        </div>

        <button class="btn btn-primary btn-book-trigger" style="width: 100%; margin-bottom: 0.75rem;" data-title="Tour Package: <?= htmlspecialchars($destination['title']) ?>" data-price="95000">
          Configure Custom Trip
        </button>

        <a href="contact.php" class="btn btn-outline" style="width: 100%; font-size: 0.88rem;">
          Speak to Local Concierge
        </a>

        <div style="margin-top: 1.5rem; font-size: 0.8rem; color: var(--text-muted); line-height: 1.5; text-align: center;">
          ✓ Includes verified luxury lodging<br/>
          ✓ 100% money-back weather reschedule guarantee<br/>
          ✓ 25% deposit to reserve
        </div>
      </div>
    </aside>
  </div>
</main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
