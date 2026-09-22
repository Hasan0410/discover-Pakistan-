from django import forms
from django.utils import timezone

from apps.hotels.models import Hotel
from apps.packages.models import TourPackage

from .models import Booking


class BookingForm(forms.ModelForm):
    class Meta:
        model = Booking
        fields = (
            'customer_name',
            'customer_email',
            'customer_phone',
            'package',
            'hotel',
            'custom_title',
            'departure_date',
            'travelers_count',
            'room_type',
            'special_requests',
        )
        widgets = {
            'departure_date': forms.DateInput(attrs={'type': 'date'}),
            'special_requests': forms.Textarea(attrs={'rows': 4}),
        }

    def __init__(self, *args, **kwargs):
        super().__init__(*args, **kwargs)
        for field in self.fields.values():
            existing_class = field.widget.attrs.get('class', '')
            field.widget.attrs['class'] = f'{existing_class} form-control'.strip()
        self.fields['package'].queryset = TourPackage.objects.order_by('title')
        self.fields['hotel'].queryset = Hotel.objects.select_related('destination').order_by('name')
        self.fields['package'].required = False
        self.fields['hotel'].required = False
        self.fields['custom_title'].required = False
        self.fields['room_type'].required = False

    def clean_departure_date(self):
        departure_date = self.cleaned_data['departure_date']
        if departure_date <= timezone.localdate():
            raise forms.ValidationError('Choose a future departure date.')
        return departure_date

    def clean_travelers_count(self):
        travelers_count = self.cleaned_data['travelers_count']
        if travelers_count < 1:
            raise forms.ValidationError('At least one traveler is required.')
        return travelers_count

    def clean(self):
        cleaned_data = super().clean()
        if not cleaned_data.get('package') and not cleaned_data.get('custom_title'):
            raise forms.ValidationError('Select a package or describe your custom trip.')
        return cleaned_data
