<?php
session_start();
$pageTitle = 'Travel Stories & Field Guides';
require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../includes/header.php';

$articles = [
    [
        'title' => 'The Complete Karakoram Highway Road Trip Guide',
        'category' => 'Expeditions',
        'read_time' => '8 min read',
        'date' => 'October 12, 2025',
        'author' => 'Imran Shah, Lead Alpine Guide',
        'image' => '../assets/images/blog/blog-kkh.jpg',
        'excerpt' => 'Everything you need to know about driving the world’s 8th wonder—from Passu Cones viewpoints and 4x4 Prado vehicle prep to high-altitude acclimatization tips.'
    ],
    [
        'title' => 'Hunza Valley in Autumn: Golden Poplars & Glacier Vistas',
        'category' => 'Seasonal',
        'read_time' => '6 min read',
        'date' => 'September 28, 2025',
        'author' => 'Zoya Malik, Travel Photographer',
        'image' => '../assets/images/blog/blog-hunza-autumn.jpg',
        'excerpt' => 'Why October and November turn Hunza, Nagar, and Baltit Fort into an unreal tapestry of fiery golden foliage, crisp mountain air, and uncrowded luxury lodges.'
    ],
    [
        'title' => 'An Insider’s Culinary & Heritage Walk Through Old Lahore',
        'category' => 'Heritage',
        'read_time' => '5 min read',
        'date' => 'August 19, 2025',
        'author' => 'Chef Hamza Tariq',
        'image' => '../assets/images/blog/blog-old-lahore.jpg',
        'excerpt' => 'Explore secret spice alleys, 100-year-old nihari cauldrons, haveli rooftops, and the intricate tilework and frescoes of Wazir Khan Mosque.'
    ],
    [
        'title' => 'Stargazing at Hingol: Balochistan’s Untamed Coast',
        'category' => 'Coastal',
        'read_time' => '7 min read',
        'date' => 'July 14, 2025',
        'author' => 'Danyal Farooq, Wilderness Naturalist',
        'image' => '../assets/images/blog/blog-hingol.jpg',
        'excerpt' => 'Discover the lunar rock landscapes of Princess of Hope, golden sand dunes at Kund Malir, and pristine zero light-pollution skies over the Arabian Sea.'
    ],
    [
        'title' => 'Skardu & Deosai: Crossing the Plains of the Giants',
        'category' => 'Wildlife',
        'read_time' => '9 min read',
        'date' => 'June 05, 2025',
        'author' => 'Sarah Jenkins, Alpine Explorer',
        'image' => '../assets/images/blog/blog-skardu-deosai.jpg',
        'excerpt' => 'A firsthand account of traversing the 4,000-meter Deosai Plateau, crystal waters of Sheosar Lake, spotting Himalayan brown bears, and camping under the stars.'
    ],
    [
        'title' => 'Sustainable & Leave-No-Trace Travel in Northern Pakistan',
        'category' => 'Eco-Tourism',
        'read_time' => '4 min read',
        'date' => 'May 22, 2025',
        'author' => 'Green Trails Collective',
        'image' => '../assets/images/blog/blog-eco-travel.jpg',
        'excerpt' => 'Practical guidelines on minimizing single-use plastic, supporting local mountain communities, and protecting fragile alpine ecology at Fairy Meadows & Nanga Parbat.'
    ]
];
?>

<main class="page-shell">
  <section class="section">
    <div class="section-heading">
      <span class="eyebrow">Discover Pakistan Dispatch</span>
      <h2>Travel Stories, Regional Insights & Expedition Guides</h2>
      <p>Written by experienced mountain guides, cultural historians, and travel photographers with authentic photography from every corner of Pakistan.</p>
    </div>

    <!-- Articles Grid -->
    <div class="cards-grid-3">
      <?php foreach ($articles as $art): ?>
        <article class="card">
          <div class="card-media">
            <span class="card-badge"><?= htmlspecialchars($art['category']) ?></span>
            <img src="<?= htmlspecialchars($art['image']) ?>" alt="<?= htmlspecialchars($art['title']) ?>" loading="lazy" />
          </div>
          <div class="card-body">
            <div style="display: flex; justify-content: space-between; font-size: 0.8rem; color: var(--text-muted); margin-bottom: 0.5rem;">
              <span><?= htmlspecialchars($art['date']) ?></span>
              <span style="color: var(--gold-accent);"><?= htmlspecialchars($art['read_time']) ?></span>
            </div>
            <h3 style="font-size: 1.25rem; line-height: 1.35;"><?= htmlspecialchars($art['title']) ?></h3>
            <p style="font-size: 0.92rem;"><?= htmlspecialchars($art['excerpt']) ?></p>
            
            <div class="card-footer">
              <span style="font-size: 0.8rem; color: var(--text-light);">By <?= htmlspecialchars($art['author']) ?></span>
              <a href="#" class="text-link">Read Story &rarr;</a>
            </div>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
