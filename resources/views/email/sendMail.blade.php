<h1>Thanks for shopping with Eshopper, {{$user->name}}</h1>
<p>Your order consists of @foreach($cart->items as $item) {{$item['data']['name']}}, @endforeach and the total amount for order is ${{$cart->totalPrice+$cart->totalPrice*0.13}}</p>
<p>See you soon</p>
<p>Please do not reply this is an auto generated email</p>
