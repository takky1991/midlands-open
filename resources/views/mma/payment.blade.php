@extends('layouts.mma')

@section('container')

    <div class="mma-payment-page">
        <img class="mma-logo" src="{{asset('images/mma_logo.png')}}" alt="">
        <h4>Hi {{$participant->first_name}}. Thank you for registering for the Midlands Open MMA League. Please complete your payment below in order to confirm your registration. Once completed your name will appear on the competitor list for the event.</h4>
        <form action="{{route('mma_submit_payment_form')}}" method="POST" id="payment-form">
            {{csrf_field()}}
            <input type="hidden" name="email" value="{{$email}}">
            <input type="hidden" name="id" value="{{$id}}">
            <span class="mma-payment-errors"></span>

            <div class="form-group">
                <label for="name">Name on card</label>
                <input type="text" size="20" class="form-control" id="name" name="name" placeholder="Name on card">
            </div>

            <div class="form-group">
                <label for="card_number">Card Number</label>
                <input type="text" size="20" class="form-control" id="card_number" name="card_number" placeholder="Card number" data-stripe="number">
            </div>
            
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Expiry (MM/YY)</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-3" style="padding-right:0">
                                <input type="text" maxlength="2" class="form-control mma-expiry" id="mm" name="mm" placeholder="mm" data-stripe="exp_month">
                            </div>
                            <div class="col-xs-3" style="padding-right:0">
                                <input type="text" maxlength="2" class="form-control mma-expiry" id="yy" name="yy" placeholder="yy" data-stripe="exp_year">
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <label for="cvc">CVC</label>
                        <input type="text" maxlength="4" class="form-control" id="cvc" name="cvc" placeholder="CVC" data-stripe="cvc">
                    </div>
                </div>
            </div>
            <button type="submit" class="submit btn btn-default">Submit Payment of €{{number_format(($amount /100), 2, '.', ' ')}}</button>
        </form>
        <img src="{{asset('images/powered_by_stripe.png')}}" class="mma-stripe-logo" alt="">
        <img class="mma-credit-card-logos"
             src="http://www.credit-card-logos.com/images/multiple_credit-card-logos-1/mc_ms_vs_accpt_h_038_gif.gif" 
             width="183" height="38" border="0" /></a>
    </div>
    
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        console.log("ready00");
            Stripe.setPublishableKey("{{config('services.stripe.key')}}");
            var $form = $('#payment-form');
        
            $form.submit(function(event) {
                // Disable the submit button to prevent repeated clicks:
                $form.find('.submit').prop('disabled', true);

                // Request a token from Stripe:
                Stripe.card.createToken($form, stripeResponseHandler);

                // Prevent the form from being submitted:
                return false;
            });
            function stripeResponseHandler(status, response) {
                // Grab the form:
                var $form = $('#payment-form');

                if (response.error) { // Problem!

                    // Show the errors on the form:
                    $form.find('.mma-payment-errors').text(response.error.message);
                    $form.find('.submit').prop('disabled', false); // Re-enable submission

                } else { // Token was created!

                    // Get the token ID:
                    var token = response.id;

                    // Insert the token ID into the form so it gets submitted to the server:
                    $form.append($('<input type="hidden" name="stripeToken">').val(token));

                    // Submit the form:
                    $form.get(0).submit();
                }
            };
        });
    </script>

@endsection