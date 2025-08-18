# usuarios/urls.py

from django.urls import path
from .views import lista_nombres_usuarios  # Importamos nuestra función

urlpatterns = [
    # Cuando alguien visite la URL 'lista/', se ejecutará nuestra función.
    path('lista/', lista_nombres_usuarios, name='lista_usuarios'),
]