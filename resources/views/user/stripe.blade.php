<!DOCTYPE html>
<html>
<head>
    <title>My Payment</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<div class="container">
    <h1>Stripe Payment</h1>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default credit-card-box">
                <div class="panel-heading display-table">
                    <h2 class="panel-title">Checkout Forms</h2>
                </div>
                <div class="panel-body">

                    @if(session('success'))
                    
    <p>Payment Successful!</p>
    <a href="{{ route('booking.slip') }}" class="btn btn-primary">View Booking Slip</a>
@endif

                    @if(session('error'))
                        <p>{{ session('error') }}</p>
                    @endif

                    <form id="checkout-form" method="POST" action="{{ route('stripe.post') }}">
    @csrf
    <input type="hidden" name="stripeToken" id="stripe-token-id">
    <input type="hidden" name="booking_id" value="{{ session('booking_id') }}">
    <input type="hidden" name="train_no" value="{{ $train->train_no }}">
    <input type="hidden" name="amount" value="{{ $train->price }}">

    <br>
    <div id="card-element" class="form-control"></div>
    <button id="pay-btn" class="btn btn-success mt-3" type="button" style="margin-top: 20px; width: 100%; padding: 7px;" onclick="createToken()">PAY ${{ $train->price }}</button>
</form>

                </div>
            </div>
        </div>
    </div>
</div>
</body>

<script src="https://js.stripe.com/v3/"></script>
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
        var stripe = Stripe('{{ env('STRIPE_KEY') }}');
        var elements = stripe.elements();

        // Create the card element
        var cardElement = elements.create('card', {
            style: {
                base: {
                    fontSize: '16px',
                    color: '#32325d',
                    '::placeholder': {
                        color: '#aab7c4'
                    }
                }
            }
        });

        cardElement.mount('#card-element');

        function createToken() {
            document.getElementById("pay-btn").disabled = true;

            stripe.createToken(cardElement).then(function(result) {
                if (result.error) {
                    document.getElementById("pay-btn").disabled = false;
                    alert(result.error.message);
                } else {
                    document.getElementById("stripe-token-id").value = result.token.id;
                    document.getElementById('checkout-form').submit();
                }
            });
        }

        // Attach the function to the button
        document.getElementById('pay-btn').addEventListener('click', createToken);
    });
</script>

@if (Session::has('success'))
    <div class="alert alert-success text-center">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <p>{{ Session::get('success') }}</p>
    </div>
@endif

@if (Session::has('error'))
    <div class="alert alert-danger text-center">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <p>{{ Session::get('error') }}</p>
    </div>
@endif

@php
    \Log::debug('Train ID in Blade: ' . $train->id);
@endphp


</html>


