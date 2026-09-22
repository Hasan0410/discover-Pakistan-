from django.urls import path
from .views import HomeView, AboutView, ContactView, CustomizeTourView

app_name = 'core'

urlpatterns = [
    path('', HomeView.as_view(), name='home'),
    path('customize-tour/', CustomizeTourView.as_view(), name='customize-tour'),
    path('about/', AboutView.as_view(), name='about'),
    path('contact/', ContactView.as_view(), name='contact'),
]
