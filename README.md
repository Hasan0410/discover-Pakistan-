# Discover Pakistan — Luxury Travel & Tourism Portal

[![Technology](https://img.shields.io/badge/Stack-HTML5%20%7C%20PHP%20%7C%20Django%205.x%20%7C%20Vanilla%20CSS-10b981.svg)](https://github.com/)
[![License](https://img.shields.io/badge/License-Commercial%20Customization-d4af37.svg)](https://github.com/)
[![Status](https://img.shields.io/badge/Status-Development-yellow.svg)](https://github.com/)

**Discover Pakistan** is a travel and tourism platform prototype designed to showcase Pakistan destinations, tours, hotels, heritage, and concierge workflows.

The repository delivers a dual-architecture deployment:
1. **Dynamic Web Portal & Interactive Frontend** (PHP 8.x / Static HTML5, Glassmorphism Design System, Custom Vanilla JS)
2. **Full-Stack Django 5.x Platform & REST API** (`discover_pakistan/` with PostgreSQL/SQLite, DRF, Authentication, Reservations, Payments, and Admin CRM)

---

## 🌟 Key Highlights & Features

### 🏛️ Public Experience & Concierge
- **Authentic Photographic Showcase**: 100% verified, authentic high-resolution photography across all destinations, tours, hotels, and editorial dispatches (Attabad Lake, Passu Cones, Baltit Fort, Deosai Plains, Badshahi Mosque, Lahore Fort, Hingol National Park, Malam Jabba, Saiful Muluk, and Fairy Meadows).
- **Flexible Booking UX**: The interface presents deposit, cancellation, and weather-reschedule options for review before production policy integration.
- **Dynamic Pricing & Expedition Customizer**: Interactive booking modal with guest-count calculations, tier selection (*Luxury Classic*, *Signature VIP*, *Alpine Trekker*), and optional add-ons (Drone videographer, portable oxygen concentrator, certified historian, VIP lounge).
- **Comprehensive Geographical Dossiers**: Exact elevation data (e.g. Hunza 2,438m, Deosai 4,114m), nearest airport codes (KDU, GIL, UET, LHE, ISB), mountain highway drive times, and seasonal weather advisories.
- **Interactive Regional Filters & Instant Search**: Instant client-side search across Gilgit-Baltistan, Khyber Pakhtunkhwa, Punjab, and Balochistan.
- **Curated Tour Catalog**: All-inclusive signature packages with pricing in PKR, vehicle specifications (4x4 Prado/Land Cruiser), and included amenities.
- **Travel Stories & Dispatch**: Editorial field guides covering the Karakoram Highway, alpine safety, culinary havelis, and eco-tourism.
- **Contact Concierge & FAQ**: Interactive multi-region inquiry form with office directories (Islamabad, Gilgit, Lahore) and interactive accordion.

### 💼 Enterprise Admin & CRM Console (`admin/index.html`)
- Real-time KPI summary widgets (Total Reservations, Active Expeditions, Gross Revenue PKR, Pending Inquiries).
- Searchable, filterable passenger reservation table with status chips (`Confirmed`, `Pending`, `Cancelled`).
- Operational dispatch status checks for NADRA e-Visa, payment gateways, and alpine rescue standby.

### 🐍 Full-Stack Django 5.x Backend (`discover_pakistan/`)
- Complete modular Django apps: `core`, `accounts`, `destinations`, `hotels`, `restaurants`, `packages`, `bookings`, `reviews`, `gallery`, `blog`, `payments`, `dashboard`, `notifications`, `search`, and `api`.
- RESTful API with explicit public catalog serializers, filtering, ordering, and pagination.
- `python manage.py seed_data` automated population command.
- Focused automated tests covering public routes, booking creation, ownership, API access, and pending payment behavior.

---

## 📁 Repository Structure

```text
travel/
├── admin/                         # Enterprise Admin Dashboard
│   └── index.html                 # KPI metrics, booking management table & filters
├── assets/
│   ├── css/
│   │   └── style.css              # Centralized design system (Tokens, Glassmorphism, Responsive)
│   ├── js/
│   │   └── main.js                # Search, category filtering, modals, toasts, form handlers
│   └── images/                    # Destination and hotel photography
├── config/
│   └── app.php                    # Master configuration and shared PHP data store
├── includes/
│   ├── header.php                 # Dynamic navigation, active state detector, mobile drawer
│   └── footer.php                 # Standardized footer, newsletter form, booking modal template
├── pages/
│   ├── about.html                 # Mission, statistics, core commitments, leadership team
│   ├── blog.php / blog.html       # Editorial field guides, author cards, reading times
│   ├── contact.php / contact.html # Inquiry form, concierge hotline, and FAQ accordion
│   ├── destination-detail.php     # Multi-day itineraries, highlights, weather, reviews
│   ├── destinations.php / .html   # Category filterable destination catalog
│   ├── hotels.php / hotels.html   # Luxury stays, amenities badges, price per night
│   ├── privacy.html               # GDPR & Pakistan Data Protection compliance policy
│   ├── terms.html                 # Booking deposits, weather reschedule terms
│   └── tours.php / tours.html     # All-inclusive guided tour package catalog
├── discover_pakistan/             # Django 5.x Full-Stack Platform
│   ├── apps/                      # 15 modular Django applications
│   ├── templates/                 # Production Django template suite (base, list, detail)
│   ├── static/                    # Static CSS/JS mirror
│   ├── manage.py
│   └── requirements.txt
├── documentation/
│   ├── deployment-guide.md        # Production hosting & Apache/Nginx guides
│   └── project-structure.md       # Architectural deep-dive
├── index.php                      # Dynamic PHP homepage
├── index.html                     # Standalone static homepage
└── README.md
```

---

## 🚀 Running Locally

### Option 1: Web Portal / PHP
1. Place the `travel/` directory into your local web server root (e.g. `htdocs/travel` for Apache/XAMPP/MAMP).
2. Start Apache and visit: `http://localhost/travel/` or `http://localhost/travel/index.php`.
3. To open static HTML directly, open `index.html` in any modern web browser.

### Option 2: Full-Stack Django 5.x Platform
1. Navigate to the `discover_pakistan` directory:
   ```bash
   cd discover_pakistan
   ```
2. Install Python dependencies:
   ```bash
   pip install -r requirements.txt
   ```
3. Run database migrations and seed sample data:
   ```bash
   python manage.py migrate
   python manage.py seed_data
   ```
4. Run automated test suite:
   ```bash
   python manage.py test apps.core
   ```
5. Start development server:
   ```bash
   python manage.py runserver
   ```
6. Access the site at `http://127.0.0.1:8000/` and Django Admin at `http://127.0.0.1:8000/admin/` (Default credentials: `admin` / `Admin@123456`).

---

## 🎨 Design System Specifications
- **Primary Emerald**: `#10b981` (Glow: `rgba(16, 185, 129, 0.25)`)
- **Accent Gold / Brass**: `#d4af37` / `#f5cf68`
- **Surface Elevation**: `rgba(16, 40, 31, 0.65)` with `backdrop-filter: blur(16px)`
- **Typography**: `Playfair Display` (Headings) & `Plus Jakarta Sans` / `Inter` (Body)
- **Breakpoints**: Mobile (`<768px`), Tablet (`768px - 1024px`), Desktop (`>1024px`)

---

## 🔒 Security & Quality Standards
- Strict input sanitization via `htmlspecialchars` in PHP.
- Django CSRF protection, PBKDF2 password hashing, and ORM SQL injection prevention.
- No hardcoded secrets in production configuration; environment variable support via `.env`.
- Responsive test coverage across Mobile, Tablet, Laptop, and 4K displays.
- Zero console errors and zero broken links.

---

## 📄 License & Commercial Customization
This project is customized for commercial demonstration and client deployment. For private branding, update `config/app.php` and `discover_pakistan/discover_pakistan/settings.py`.
