from django.http import JsonResponse
from django.views.decorators.csrf import csrf_exempt
from .models import Cart
import json

@csrf_exempt
def update_cart_position(request):
    if request.method == 'POST':
        data = json.loads(request.body)
        cart_id = data.get('id')
        x = data.get('x')
        y = data.get('y')

        # Atualiza ou cria um novo carrinho com as coordenadas recebidas
        cart, created = Cart.objects.update_or_create(id=cart_id, defaults={'x': x, 'y': y})

        return JsonResponse({'message': 'Cart position updated', 'cart_id': cart.id})

    return JsonResponse({'error': 'Invalid request method'}, status=400)

def get_cart_info(request):
    carts = Cart.objects.all()
    cart_info = [{'id': str(cart.id), 'x': cart.x, 'y': cart.y, 'status': cart.status} for cart in carts]
    return JsonResponse({'cart_info': cart_info})

@csrf_exempt
def request_cart(request):
    if request.method == 'POST':
        # Retorna o primeiro carrinho disponível
        available_cart = Cart.objects.filter(status='available').first()
        if available_cart:
            available_cart.status = 'requested'
            available_cart.save()
            return JsonResponse({'message': 'Cart requested', 'cart_id': str(available_cart.id)})
        return JsonResponse({'error': 'No carts available'}, status=404)

    return JsonResponse({'error': 'Invalid request method'}, status=400)

@csrf_exempt
def accept_cart_request(request):
    if request.method == 'POST':
        data = json.loads(request.body)
        cart_id = data.get('cart_id')
        cart = Cart.objects.filter(id=cart_id).first()
        if cart and cart.status == 'requested':
            cart.status = 'accepted'
            cart.save()
            return JsonResponse({'message': 'Cart request accepted', 'cart_id': str(cart.id)})
        return JsonResponse({'error': 'Cart not found or not requested'}, status=404)

    return JsonResponse({'error': 'Invalid request method'}, status=400)

@csrf_exempt
def complete_cart_request(request):
    if request.method == 'POST':
        data = json.loads(request.body)
        cart_id = data.get('cart_id')
        cart = Cart.objects.filter(id=cart_id).first()
        if cart and cart.status == 'accepted':
            cart.status = 'available'  # Torna o carrinho disponível novamente
            cart.save()
            return JsonResponse({'message': 'Cart request completed', 'cart_id': str(cart.id)})
        return JsonResponse({'error': 'Cart not found or not accepted'}, status=404)

    return JsonResponse({'error': 'Invalid request method'}, status=400)
