from django.contrib import admin
from django.urls import path, include
from django.conf import settings
from django.conf.urls.static import static

urlpatterns = [
    path('admin/', admin.site.urls),
    path('', include('apps.core.urls')),
    path('accounts/', include('apps.accounts.urls')),
    path('destinations/', include('apps.destinations.urls')),
    path('hotels/', include('apps.hotels.urls')),
    path('restaurants/', include('apps.restaurants.urls')),
    path('packages/', include('apps.packages.urls')),
    path('bookings/', include('apps.bookings.urls')),
    path('reviews/', include('apps.reviews.urls')),
    path('gallery/', include('apps.gallery.urls')),
    path('blog/', include('apps.blog.urls')),
    path('payments/', include('apps.payments.urls')),
    path('dashboard/', include('apps.dashboard.urls')),
    path('notifications/', include('apps.notifications.urls')),
    path('search/', include('apps.search.urls')),
    path('api/', include('apps.api.urls')),
]

if settings.DEBUG:
    urlpatterns += static(settings.MEDIA_URL, document_root=settings.MEDIA_ROOT)
