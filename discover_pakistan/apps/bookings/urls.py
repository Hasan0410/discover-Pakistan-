from django.urls import path
from . import views

app_name = 'bookings'

urlpatterns = [
    path('create/', views.booking_create_view, name='create'),
    path('<str:booking_id>/', views.booking_detail_view, name='detail'),
]
