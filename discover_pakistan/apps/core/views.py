from django.views.generic import TemplateView
from apps.destinations.models import Destination
from apps.hotels.models import Hotel
from apps.packages.models import TourPackage
from apps.blog.models import BlogPost


class HomeView(TemplateView):
    template_name = 'home.html'

    def get_context_data(self, **kwargs):
        context = super().get_context_data(**kwargs)
        context['featured_destinations'] = Destination.objects.all().order_by('-rating')[:4]
        context['featured_hotels'] = Hotel.objects.all().order_by('-rating')[:3]
        context['featured_packages'] = TourPackage.objects.all().order_by('-price')[:3]
        context['recent_posts'] = BlogPost.objects.filter(is_published=True).order_by('-published_at')[:3]
        return context


class CustomizeTourView(TemplateView):
    template_name = 'customize_tour.html'

    def get_context_data(self, **kwargs):
        context = super().get_context_data(**kwargs)
        context['destinations'] = [
            'Hunza Valley',
            'Skardu & Deosai',
            'Swat & Kalam',
            'Naran Kaghan',
            'Neelum Valley',
            'Kumrat Valley',
            'Murree & Nathia Gali',
        ]
        return context


class AboutView(TemplateView):
    template_name = 'about.html'


class ContactView(TemplateView):
    template_name = 'contact.html'

