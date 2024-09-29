from django.db import models
import uuid

class Cart(models.Model):
    id = models.UUIDField(primary_key=True, default=uuid.uuid4, editable=False)
    x = models.FloatField()
    y = models.FloatField()
    status = models.CharField(max_length=50, default='available')  # Status do carrinho

    def __str__(self):
        return f'Cart {self.id} at position ({self.x}, {self.y})'
