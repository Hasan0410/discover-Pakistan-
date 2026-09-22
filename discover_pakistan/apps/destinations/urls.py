from django.urls import path
from .views import DestinationListView, DestinationDetailView

app_name = 'destinations'

urlpatterns = [
    path('', DestinationListView.as_view(), name='list'),
    path('<slug:slug>/', DestinationDetailView.as_view(), name='detail'),
]
