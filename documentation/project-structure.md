# Discover Pakistan — Architectural & Structure Guide

## Overview
Discover Pakistan is organized into two synchronized application tiers:

### 1. Frontend & Dynamic Web Tier
- **`index.php` / `index.html`**: Master luxury landing page with hero statistics, destination showcases, signature tours, testimonials, and trust points.
- **`pages/`**: Public modules including:
  - `destinations.php` / `destinations.html`: Region & category filterable destination catalog.
  - `destination-detail.php`: Multi-day itineraries, regional highlights, weather guidelines, and traveler reviews.
  - `hotels.php` / `hotels.html`: Luxury hotels, amenities tags, and per-night rates.
  - `tours.php` / `tours.html`: Signature packages, duration badges, and included features.
  - `blog.php` / `blog.html`: Travel stories, reading times, and expedition guides.
  - `about.html`: Mission statement, leadership team, and sustainable tourism pledge.
  - `contact.php` / `contact.html`: Inquiry form, concierge directory, and FAQ accordion.
  - `privacy.html` / `terms.html`: Complete legal and booking terms.
- **`admin/`**: Enterprise dashboard with KPI summary widgets and interactive booking table.
- **`includes/`**: Shared header navigation, dynamic active links, and footer modal dialogs.
- **`config/`**: Global PHP configuration and data fixtures.
- **`assets/`**: Centralized design system (`style.css`), master interactive JavaScript (`main.js`), and media.

### 2. Full-Stack Django 5.x Tier (`discover_pakistan/`)
- **`apps/`**:
  - `accounts`: User authentication, profile bio, avatar handling.
  - `destinations`: Provinces, Destinations, slug lookups, ratings.
  - `hotels`: Luxury stays, destination relations, per-night pricing.
  - `packages`: Multi-destination tour packages, duration, pricing.
  - `restaurants`: Regional dining, cuisine types, ratings.
  - `bookings`: Reservations, customer contact, party size, status tracking.
  - `reviews`: Star ratings and verified traveler testimonials.
  - `gallery`: Media management and featured photos.
  - `blog`: Articles, categories, authors, publishing status.
  - `payments`: Transaction records, currency (PKR/USD), payment methods.
  - `dashboard`: User and admin metrics overview.
  - `notifications`: User alerts and inquiry updates.
  - `search`: Multi-model query matching.
  - `api`: Django REST Framework ViewSets and serializers.
- **`templates/`**: Production Jinja/Django templates inheriting from `base.html`.
