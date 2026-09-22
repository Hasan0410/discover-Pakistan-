<?php
/**
 * Discover Pakistan - Master Header Layout
 */
$currentPage = basename($_SERVER['PHP_SELF']);
$basePath = (strpos($_SERVER['PHP_SELF'], '/pages/') !== false) ? '../' : './';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= isset($pageTitle) ? htmlspecialchars($pageTitle) . ' | ' : '' ?><?= $siteTitle ?> — Luxury Travel Across Pakistan</title>
  <meta name="description" content="<?= htmlspecialchars($siteDescription) ?>" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="<?= $basePath ?>assets/css/style.css" />
</head>
<body>
  <!-- Discover Pakistan utility contact bar -->
  <div class="top-utility-bar">
    <div class="top-utility-left">
      <a href="tel:<?= $sitePhone ?>" class="top-contact-link">
        <svg class="ui-icon" aria-hidden="true" viewBox="0 0 24 24"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 2 .7 2.9a2 2 0 0 1-.5 2.1L8 9.9a16 16 0 0 0 6 6l1.2-1.3a2 2 0 0 1 2.1-.5c.9.3 1.9.6 2.9.7A2 2 0 0 1 22 16.9Z"/></svg> <?= $sitePhoneFormatted ?>
      </a>
      <a href="mailto:<?= $siteEmail ?>" class="top-contact-link">
        <svg class="ui-icon" aria-hidden="true" viewBox="0 0 24 24"><path d="m4 4 8 7 8-7"/><rect x="3" y="4" width="18" height="16" rx="2"/></svg> <?= $siteEmail ?>
      </a>
    </div>
    <div class="top-utility-right">
      <div class="top-social-links">
        <a href="https://facebook.com" target="_blank" title="Facebook" aria-label="Facebook">ⓕ</a>
        <a href="https://instagram.com" target="_blank" title="Instagram" aria-label="Instagram">ⓘ</a>
        <a href="https://youtube.com" target="_blank" title="YouTube" aria-label="YouTube">▶</a>
        <a href="https://tiktok.com" target="_blank" title="TikTok" aria-label="TikTok">🎵</a>
      </div>
      <a href="<?= $basePath ?>pages/customize-tour.php" class="btn-customize-pill">
        <svg class="ui-icon" aria-hidden="true" viewBox="0 0 24 24"><path d="m3 11 18-8-8 18-2.5-7.5L3 11Z"/><path d="m10.5 13.5 4-4"/></svg> Customize a Tour
      </a>
    </div>
  </div>

  <!-- Main Navigation Bar -->
  <header class="topbar">
    <div class="brand-container">
      <div class="brand-logo">
        <img src="<?= $basePath ?>assets/images/logo.png" alt="Nature Hike Pakistan Logo" />
      </div>
      <a class="brand-name" href="<?= $basePath ?>index.php">Discover Pakistan</a>
    </div>

    <nav class="nav-links">
      <a href="<?= $basePath ?>index.php" class="<?= $currentPage === 'index.php' ? 'active' : '' ?>">Home</a>
      
      <!-- Pakistan Tours Dropdown -->
      <div class="nav-dropdown-item">
        <a href="<?= $basePath ?>pages/destinations.php" class="nav-dropdown-toggle <?= $currentPage === 'destinations.php' ? 'active' : '' ?>">
          Pakistan Tours <span style="font-size: 0.75rem;">▼</span>
        </a>
        <div class="nav-dropdown-menu">
          <a href="<?= $basePath ?>pages/tours.php?region=Swat">Swat Kalam Packages</a>
          <a href="<?= $basePath ?>pages/tours.php?region=Hunza">Hunza Tour Packages</a>
          <a href="<?= $basePath ?>pages/tours.php?region=Skardu">Skardu Tour Packages</a>
          <a href="<?= $basePath ?>pages/tours.php?region=Murree">Nathia Gali & Murree</a>
          <a href="<?= $basePath ?>pages/tours.php?region=Kashmir">Neelum Valley Kashmir</a>
          <a href="<?= $basePath ?>pages/tours.php?region=Naran">Naran Kaghan Tours</a>
          <a href="<?= $basePath ?>pages/tours.php?region=Kumrat">Kumrat Valley Packages</a>
        </div>
      </div>

      <!-- City Tours Dropdown -->
      <div class="nav-dropdown-item">
        <a href="<?= $basePath ?>pages/tours.php?type=city" class="nav-dropdown-toggle">
          City Tours <span style="font-size: 0.75rem;">▼</span>
        </a>
        <div class="nav-dropdown-menu">
          <a href="<?= $basePath ?>pages/tours.php?region=Lahore">Lahore City Tours</a>
          <a href="<?= $basePath ?>pages/tours.php?region=Islamabad">Islamabad Sightseeing</a>
          <a href="<?= $basePath ?>pages/tours.php?region=Karachi">Karachi Coastal Tours</a>
          <a href="<?= $basePath ?>pages/tours.php?region=Peshawar">Peshawar Heritage Tours</a>
          <a href="<?= $basePath ?>pages/tours.php?region=Multan">Multan Sufi Heritage</a>
        </div>
      </div>

      <a href="<?= $basePath ?>pages/tours.php" class="<?= $currentPage === 'tours.php' ? 'active' : '' ?>">Group Tour</a>
      <a href="<?= $basePath ?>pages/customize-tour.php" class="<?= $currentPage === 'customize-tour.php' ? 'active' : '' ?>" style="color: var(--nature-green-light); font-weight: 700;">Customize My Tour</a>
      <a href="<?= $basePath ?>pages/blog.php" class="<?= $currentPage === 'blog.php' ? 'active' : '' ?>">Blogs</a>
      <a href="<?= $basePath ?>pages/about.php" class="<?= $currentPage === 'about.php' ? 'active' : '' ?>">About Us</a>
      <a href="<?= $basePath ?>pages/contact.php" class="<?= $currentPage === 'contact.php' ? 'active' : '' ?>">Contact Us</a>
    </nav>

    <div class="nav-actions">
      <a href="https://wa.me/<?= $siteWhatsApp ?>" target="_blank" class="btn btn-outline btn-sm whatsapp-link" style="border-color: #25d366; color: #25d366;">
        <svg class="ui-icon" aria-hidden="true" viewBox="0 0 24 24"><path d="M20.5 3.5A10 10 0 0 0 4.7 15.9L3 21l5.2-1.7A10 10 0 1 0 20.5 3.5Z"/><path d="M8.5 7.5c.3-.3.7-.3 1 0l1 1.4c.2.3.2.6 0 .9l-.7.8a8 8 0 0 0 3.6 3.6l.8-.7c.3-.2.6-.2.9 0l1.4 1c.3.3.3.7 0 1-.7.8-1.7 1.1-2.7.8-3.2-1-5.7-3.5-6.7-6.7-.3-1 0-2 .8-2.7Z"/></svg> WhatsApp VIP
      </a>
      <a href="<?= $basePath ?>pages/customize-tour.php" class="btn btn-primary btn-sm" style="background: var(--nature-green);">
        Plan a Tour
      </a>
    </div>

    <button class="mobile-menu-toggle" aria-label="Toggle navigation menu">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <line x1="3" y1="12" x2="21" y2="12"></line>
        <line x1="3" y1="6" x2="21" y2="6"></line>
        <line x1="3" y1="18" x2="21" y2="18"></line>
      </svg>
    </button>
  </header>
