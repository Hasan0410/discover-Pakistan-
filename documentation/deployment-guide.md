# Discover Pakistan — Production Deployment Guide

## 1. PHP / Web Portal Deployment

### Apache & Nginx Setup
- **Web Root**: Point document root to `travel/`.
- **PHP Version**: PHP 8.0+ recommended.
- **Apache Rewrite Rules**: Verify `.htaccess` is enabled with `AllowOverride All`.
- **SSL / HTTPS**: Enforce TLS 1.3 certificates via Let's Encrypt / Certbot.

### Sample Nginx Configuration (PHP-FPM)
```nginx
server {
    listen 80;
    server_name discoverpakistan.travel www.discoverpakistan.travel;
    root /var/www/travel;
    index index.php index.html;

    location / {
        try_files $uri $uri/ /index.php?$args;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
    }
}
```

---

## 2. Django 5.x Full-Stack Deployment

### Production Prerequisites
1. Python 3.10+
2. PostgreSQL (or SQLite for light hosting)
3. Gunicorn / Uvicorn WSGI/ASGI server
4. Nginx Reverse Proxy
5. Redis (optional, for caching)

### Production Setup Commands
```bash
# 1. Clone and navigate
cd discover_pakistan

# 2. Virtual Environment
python -m venv venv
source venv/bin/activate  # Or `venv\Scripts\activate` on Windows

# 3. Dependencies
pip install -r requirements.txt gunicorn psycopg2-binary

# 4. Environment Variables
export DEBUG=False
export SECRET_KEY='your-strong-random-production-key'
export ALLOWED_HOSTS='discoverpakistan.travel,www.discoverpakistan.travel'

# 5. Database & Static Collection
python manage.py migrate
python manage.py collectstatic --noinput
python manage.py seed_data

# 6. Start Gunicorn
gunicorn discover_pakistan.wsgi:application --bind 127.0.0.1:8000 --workers 3
```

### Sample Nginx Configuration (Django Gunicorn Reverse Proxy)
```nginx
server {
    listen 80;
    server_name api.discoverpakistan.travel;

    location /static/ {
        alias /var/www/travel/discover_pakistan/staticfiles/;
    }

    location /media/ {
        alias /var/www/travel/discover_pakistan/media/;
    }

    location / {
        proxy_pass http://127.0.0.1:8000;
        proxy_set_header Host $host;
        proxy_set_header X-Real-IP $remote_addr;
        proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
        proxy_set_header X-Forwarded-Proto $scheme;
    }
}
```
