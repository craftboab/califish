<div>Customer: {{$user->name}}!</div>

<div>Order Items</div>
@foreach($cartitems as $cartitem)
<div>{{ $cartitem->name }}:  {{ $cartitem->quantity }}</div>
<div>Price:  {{ $cartitem->amount}}</div>
</div>
</br>
@endforeach
<div>Total</div>
<div>${{ $subtotal }}</div>
