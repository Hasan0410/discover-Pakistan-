from pathlib import Path
import os
from urllib.parse import urlparse
from django.core.exceptions import ImproperlyConfigured
from dotenv import load_dotenv

load_dotenv()

BASE_DIR = Path(__file__).resolve().parent.parent

def env_bool(name, default=False):
    return os.getenv(name, str(default)).lower() in {'1', 'true', 'yes'}


SECRET_KEY = os.getenv('SECRET_KEY', 'development-only-key-change-before-deployment-7f4b2a9c1d8e6f3a')
ENVIRONMENT = os.getenv('ENVIRONMENT', 'development').lower()
IS_PRODUCTION = ENVIRONMENT == 'production'
if IS_PRODUCTION and not os.getenv('SECRET_KEY'):
    raise ImproperlyConfigured('SECRET_KEY must be set when ENVIRONMENT=production.')
DEBUG = env_bool('DEBUG', not IS_PRODUCTION)
ALLOWED_HOSTS = [host.strip() for host in os.getenv('ALLOWED_HOSTS', '127.0.0.1,localhost,testserver').split(',') if host.strip()]
if IS_PRODUCTION and not os.getenv('ALLOWED_HOSTS'):
    raise ImproperlyConfigured('ALLOWED_HOSTS must be set when ENVIRONMENT=production.')

INSTALLED_APPS = [
    'django.contrib.admin',
    'django.contrib.auth',
    'django.contrib.contenttypes',
    'django.contrib.sessions',
    'django.contrib.messages',
    'django.contrib.staticfiles',
    'rest_framework',
    'django_filters',
    'apps.core',
    'apps.accounts',
    'apps.destinations',
    'apps.hotels',
    'apps.restaurants',
    'apps.packages',
    'apps.bookings',
    'apps.reviews',
    'apps.gallery',
    'apps.blog',
    'apps.payments',
    'apps.dashboard',
    'apps.notifications',
    'apps.api',
    'apps.search',
]

MIDDLEWARE = [
    'django.middleware.security.SecurityMiddleware',
    'whitenoise.middleware.WhiteNoiseMiddleware',
    'django.contrib.sessions.middleware.SessionMiddleware',
    'django.middleware.common.CommonMiddleware',
    'django.middleware.csrf.CsrfViewMiddleware',
    'django.contrib.auth.middleware.AuthenticationMiddleware',
    'django.contrib.messages.middleware.MessageMiddleware',
    'django.middleware.clickjacking.XFrameOptionsMiddleware',
]

ROOT_URLCONF = 'discover_pakistan.urls'

TEMPLATES = [
    {
        'BACKEND': 'django.template.backends.django.DjangoTemplates',
        'DIRS': [BASE_DIR / 'templates'],
        'APP_DIRS': True,
        'OPTIONS': {
            'context_processors': [
                'django.template.context_processors.request',
                'django.contrib.auth.context_processors.auth',
                'django.contrib.messages.context_processors.messages',
            ],
        },
    },
]

WSGI_APPLICATION = 'discover_pakistan.wsgi.application'

database_url = os.getenv('DATABASE_URL')
if database_url:
    parsed_database_url = urlparse(database_url)
    if parsed_database_url.scheme in {'postgres', 'postgresql'}:
        DATABASES = {'default': {
            'ENGINE': 'django.db.backends.postgresql',
            'NAME': parsed_database_url.path.lstrip('/'),
            'USER': parsed_database_url.username or '',
            'PASSWORD': parsed_database_url.password or '',
            'HOST': parsed_database_url.hostname or '',
            'PORT': str(parsed_database_url.port or ''),
        }}
    elif parsed_database_url.scheme == 'sqlite':
        DATABASES = {'default': {'ENGINE': 'django.db.backends.sqlite3', 'NAME': parsed_database_url.path}}
    else:
        raise ValueError('DATABASE_URL must use postgres, postgresql, or sqlite.')
else:
    DATABASES = {'default': {
        'ENGINE': os.getenv('DB_ENGINE', 'django.db.backends.sqlite3'),
        'NAME': os.getenv('DB_NAME', str(BASE_DIR / 'db.sqlite3')),
        'USER': os.getenv('DB_USER', ''),
        'PASSWORD': os.getenv('DB_PASSWORD', ''),
        'HOST': os.getenv('DB_HOST', ''),
        'PORT': os.getenv('DB_PORT', ''),
    }}

AUTH_PASSWORD_VALIDATORS = [
    {'NAME': 'django.contrib.auth.password_validation.UserAttributeSimilarityValidator'},
    {'NAME': 'django.contrib.auth.password_validation.MinimumLengthValidator'},
    {'NAME': 'django.contrib.auth.password_validation.CommonPasswordValidator'},
    {'NAME': 'django.contrib.auth.password_validation.NumericPasswordValidator'},
]

LANGUAGE_CODE = 'en-us'
TIME_ZONE = 'UTC'
USE_I18N = True
USE_TZ = True

STATIC_URL = 'static/'
STATICFILES_DIRS = [BASE_DIR / 'static']
STATIC_ROOT = BASE_DIR / 'staticfiles'
STATICFILES_STORAGE = 'whitenoise.storage.CompressedManifestStaticFilesStorage'
MEDIA_URL = '/media/'
MEDIA_ROOT = BASE_DIR / 'media'

DEFAULT_AUTO_FIELD = 'django.db.models.BigAutoField'

AUTH_USER_MODEL = 'accounts.User'

SECURE_SSL_REDIRECT = env_bool('SECURE_SSL_REDIRECT', IS_PRODUCTION)
SESSION_COOKIE_SECURE = env_bool('SESSION_COOKIE_SECURE', IS_PRODUCTION)
CSRF_COOKIE_SECURE = env_bool('CSRF_COOKIE_SECURE', IS_PRODUCTION)
SESSION_COOKIE_HTTPONLY = True
SECURE_HSTS_SECONDS = int(os.getenv('SECURE_HSTS_SECONDS', '31536000' if IS_PRODUCTION else '0'))
SECURE_HSTS_INCLUDE_SUBDOMAINS = env_bool('SECURE_HSTS_INCLUDE_SUBDOMAINS', IS_PRODUCTION)
SECURE_HSTS_PRELOAD = env_bool('SECURE_HSTS_PRELOAD', IS_PRODUCTION)
SECURE_CONTENT_TYPE_NOSNIFF = True
X_FRAME_OPTIONS = 'DENY'
SECURE_PROXY_SSL_HEADER = ('HTTP_X_FORWARDED_PROTO', 'https')
CSRF_TRUSTED_ORIGINS = [origin.strip() for origin in os.getenv('CSRF_TRUSTED_ORIGINS', '').split(',') if origin.strip()]

REST_FRAMEWORK = {
    'DEFAULT_PAGINATION_CLASS': 'rest_framework.pagination.PageNumberPagination',
    'PAGE_SIZE': 20,
    'DEFAULT_FILTER_BACKENDS': ['django_filters.rest_framework.DjangoFilterBackend', 'rest_framework.filters.SearchFilter', 'rest_framework.filters.OrderingFilter'],
}
