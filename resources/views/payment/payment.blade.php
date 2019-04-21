@include('layouts.checkoutHeader')



<section id="do_action">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Order status <span>{{$payment_info['status']}}</span></li>
                        <li>Shipping Cost <span>Free</span></li>
                        <li>Total <span>${{$payment_info['price']}}</span></li>
                    </ul>


                        <a class="btn btn-default check_out" id = "paypal-button">Pay now</a>





                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->



@include('layouts.footer')


<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
    paypal.Button.render({
        // Configure environment
        env: 'sandbox',
        client: {
            sandbox: 'ASZyRLGK4rRIr4wwPmx6SukwpSR03xCSj0q50rqjZRGPVqNY4W4LYZhchW_yXMO9X0QZ1f7N1bQsPQcq',
            production: 'demo_production_client_id'
        },
        // Customize button (optional)
        locale: 'en_US',
        style: {
            size: 'small',
            color: 'gold',
            shape: 'pill',
        },

        // Enable Pay Now checkout flow (optional)
        commit: true,

        // Set up a payment
        payment: function(data, actions) {
            return actions.payment.create({
                transactions: [{
                    amount: {
                        total: {{$payment_info["price"]}},
                        currency: 'CAD'
                    }
                }]
            });
        },
        // Execute the payment
        onAuthorize: function(data, actions) {
            return actions.payment.execute().then(function() {
                // Show a confirmation message to the buyer
                window.alert('Thank you for your purchase!');
                console.log(data);
            });
        }
    }, '#paypal-button');

</script>