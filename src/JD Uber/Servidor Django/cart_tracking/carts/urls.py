from django.urls import path
from . import views

urlpatterns = [
    path('api/update_position/', views.update_cart_position, name='update_cart_position'),
    path('api/get_cart_info/', views.get_cart_info, name='get_cart_info'),
    path('api/request_cart/', views.request_cart, name='request_cart'),
    path('api/accept_cart/', views.accept_cart_request, name='accept_cart_request'),
    path('api/complete_cart/', views.complete_cart_request, name='complete_cart_request'),
]
