from django.contrib.auth.forms import UserCreationForm
from django.urls import reverse_lazy
from django.views.generic import CreateView
from django.contrib.auth import views as auth_views
from django.contrib.auth import get_user_model
from django import forms

User = get_user_model()


class CustomUserCreationForm(UserCreationForm):
    email = forms.EmailField(required=True)

    class Meta:
        model = User
        fields = ('username', 'email', 'first_name', 'last_name')


class RegisterView(CreateView):
    model = User
    form_class = CustomUserCreationForm
    template_name = 'accounts/register.html'
    success_url = reverse_lazy('accounts:login')


class CustomLoginView(auth_views.LoginView):
    template_name = 'accounts/login.html'


class CustomLogoutView(auth_views.LogoutView):
    next_page = reverse_lazy('core:home')
