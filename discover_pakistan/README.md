# Discover Pakistan — Django 5.x Full-Stack Platform

Python/Django backend and REST API engine for the Discover Pakistan travel portal.

## Features
- **Modular App Architecture**: 15 integrated apps (`accounts`, `destinations`, `hotels`, `packages`, `restaurants`, `bookings`, `reviews`, `gallery`, `blog`, `payments`, `dashboard`, `notifications`, `search`, `api`, `core`).
- **RESTful API**: Built with Django REST Framework (DRF), providing search, filtering, ordering, and pagination for all resources.
- **Automated Data Seeding**: `python manage.py seed_data` creates content data and sample records without provisioning usable passwords.
- **Universal Search**: Multi-model query matching destinations, hotels, and tours.
- **Automated Test Suite**: Focused Django tests (`python manage.py test`) covering public routes and core booking/security flows.

## Quick Setup
```bash
# 1. Install dependencies
pip install -r requirements.txt

# 2. Configure environment
copy .env.example .env

# 3. Apply migrations
python manage.py migrate

# 4. Populate test data
python manage.py seed_data

# 5. Run tests
python manage.py test apps.core

# 6. Start server
python manage.py runserver
```

## Local Accounts
No passwords are seeded or documented. Create an administrator interactively with:

```bash
python manage.py createsuperuser
```

The seed command creates content data only and does not provision a usable password.
