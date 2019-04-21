@include('layouts.header')


<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Check out</li>
            </ol>
        </div><!--/breadcrums-->


        <div class="shopper-informations">
            <div class="row">
                <div class="col-sm-8 ">
                    <div class="bill-to">
                        <p>Bill To</p>
                        <div class="form-one">
                            <form action  = "/cart/createNewOrder" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <input type="text" placeholder="Email" value="{{old('email')}}" name = "email">
                                @if ($errors->any())
                                    @foreach ($errors->get('email') as $error)
                                        <p style="color:red;">{{ $error }}</p>
                                    @endforeach
                                @endif
                                <input type="text" placeholder="First Name" value="{{old('first_name')}}" name = "first_name">
                                @if ($errors->any())
                                    @foreach ($errors->get('first_name') as $error)
                                        <p style="color:red;">{{ $error }}</p>
                                    @endforeach
                                @endif
                                <input type="text" placeholder="Last Name" value="{{old('last_name')}}" name = "last_name">
                                @if ($errors->any())
                                    @foreach ($errors->get('last_name') as $error)
                                        <p style="color:red;">{{ $error }}</p>
                                    @endforeach
                                @endif
                                <input type="text" placeholder="Address" value="{{old('address')}}" name = "address">
                                @if ($errors->any())
                                    @foreach ($errors->get('address') as $error)
                                        <p style="color:red;">{{ $error }}</p>
                                    @endforeach
                                @endif
                                <input type="text" placeholder="Zip / Postal Code" value="{{old('zip')}}" name = "zip">
                                @if ($errors->any())
                                    @foreach ($errors->get('zip') as $error)
                                        <p style="color:red;">{{ $error }}</p>
                                    @endforeach
                                @endif

                                @if ($errors->any())
                                    @foreach ($errors->get('state') as $error)
                                        <p style="color:red;">{{ $error }}</p>
                                    @endforeach
                                @endif
                                <input type="text" placeholder="Phone" value="{{old('phone')}}" name = "phone">
                                @if ($errors->any())
                                    @foreach ($errors->get('phone') as $error)
                                        <p style="color:red;">{{ $error }}</p>
                                    @endforeach
                                @endif
                                <input type = "submit" name = "submit" value  = "Proceed to Payment" class = "btn btn-warning">
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="review-payment">
            <h2>Review & Payment</h2>
        </div>

        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                <tr class="cart_menu">
                    <td class="image">Item</td>
                    <td class="description"></td>
                    <td class="price">Price</td>
                    <td class="total">Total</td>
                </tr>
                </thead>
                <tbody>
                @foreach($cartItems->items as $item)
                    <tr>
                        <td class="cart_product">
                            <a href=""><img style = "width:200px;height:200px;" src="{{Storage::disk('local')->url('product_images/'.$item['data']['image'])}}" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{$item['data']['name']}}</a></h4>
                            <p>Web ID: {{$item['data']['id']}}</p>
                        </td>
                        <td class="cart_price">
                            <p>${{$item['data']['price']}}</p>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">${{$item['totalSinglePrice']}}</p>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3">&nbsp;</td>
                    <td colspan="2">
                        <table class="table table-condensed total-result">
                            <tr>
                                <td>Cart Sub Total</td>
                                <td>{{$cartItems->totalPrice}}</td>
                            </tr>
                            <tr>
                                <td>Exo Tax</td>
                                <td>{{$cartItems->totalPrice*0.13}}</td>
                            </tr>
                            <tr class="shipping-cost">
                                <td>Shipping Cost</td>
                                <td>Free</td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td><span>${{$cartItems->totalPrice+$cartItems->totalPrice*0.13}}</span></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="payment-options">
					<span>
						<label><input type="checkbox"> Direct Bank Transfer</label>
					</span>
            <span>
						<label><input type="checkbox"> Check Payment</label>
					</span>
            <span>
						<label><input type="checkbox"> Paypal</label>
					</span>
        </div>
    </div>
</section> <!--/#cart_items-->


@include('layouts.footer')
