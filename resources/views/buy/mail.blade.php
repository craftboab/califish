<div>Hi, {{$user->name}}!</div>

<div>Your purchasing describe</div>
@foreach($cartitems as $cartitem)
<div>{{ $cartitem->name}}</div>
<div>{{ $cartitem->amount}}</div>
</br>
@endforeach
<div>Total</div>
<div>${{ $subtotal }}</div>
<div>Thank you for shopping</div>
