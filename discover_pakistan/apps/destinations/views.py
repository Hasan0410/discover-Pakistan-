from django.views.generic import ListView, DetailView
from .models import Destination


class DestinationListView(ListView):
    model = Destination
    template_name = 'destinations.html'
    context_object_name = 'destinations'


class DestinationDetailView(DetailView):
    model = Destination
    template_name = 'destination_detail.html'
    context_object_name = 'destination'
