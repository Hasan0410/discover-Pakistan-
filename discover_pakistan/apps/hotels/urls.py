from django.urls import path
from . import views

app_name = 'hotels'

urlpatterns = [
    path('', views.hotel_list_view, name='list'),
    path('<int:pk>/', views.hotel_detail_view, name='detail'),
]
