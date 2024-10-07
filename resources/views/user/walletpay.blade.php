
@extends('layouts.theme')

@section('title','Pay '.session()->get('currenct_currency') . $amount)
@section('main-wrapper')

<section id="main-wrapper" class="main-wrapper user-account-section wallet-block">
  <div class="container-fluid">
 
    <div class="bg-white col-md-12">
    <h5>{{ __('ADD') }} &nbsp;<i class="{{ $currency_symbol }}"></i> {{ $amount }} {{ __('via') }}</h5>
    <hr>
    <!--- Add money to wallet through paytm  -->
    @if($wallet_settings->paytm_enable == 1)
      <div class="mt-2 shadow-sm card">
        
        <div class="card-body">
          <h5 class="card-title">{{ __("Pay with PAYTM") }}
          </h5>
          
            <p class="card-text">
                {{ __("Netbanking, Debit / Credit Card, Paytm wallet, UPI available") }}
            </p>
            
            <form action="{{ route('wallet.add.using.paytm') }}" method="POST">
              @csrf
              <input type="hidden" value="{{ $amount }}" name="amount">
              <button type="submit" class="btn btn-default">
                <span>{{ __('Pay') }} <i class="{{ $currency_symbol }}"></i> {{ $amount }} </span> 
              </button>
            </form>
        </div>
      </div>
    @endif
    <br>
    <!---  end --->

    <!--- Add money to wallet through paypal  -->
    @if($wallet_settings->paypal_enable == 1)
      <div class="mt-2 shadow-sm card">
        
        <div class="card-body">
          <h5 class="card-title">{{ __("Pay with Payapl") }}
          </h5>

            <p class="card-text">
              {{ __("Netbanking, Debit / Credit Card, Paytm wallet") }}
          </p>
            
            <form action="{{ route('wallet.add.using.paypal') }}" method="POST">
              @csrf
              <input type="hidden" value="{{ $amount }}" name="amount">
              <button type="submit" class="btn btn-default">
                <span>{{ __('Pay') }} &nbsp;<i class="{{ $currency_symbol }}"></i> {{ $amount }}</span> 
                
            </button>
            </form>
            <div class="pull-right">
              <svg aria-label="PayPal" xmlns="http://www.w3.org/2000/svg" width="90" height="33" viewBox="34.417 0 90 33">
                <path fill="#253B80" d="M46.211 6.749h-6.839a.95.95 0 0 0-.939.802l-2.766 17.537a.57.57 0 0 0 .564.658h3.265a.95.95 0 0 0 .939-.803l.746-4.73a.95.95 0 0 1 .938-.803h2.165c4.505 0 7.105-2.18 7.784-6.5.306-1.89.013-3.375-.872-4.415-.972-1.142-2.696-1.746-4.985-1.746zM47 13.154c-.374 2.454-2.249 2.454-4.062 2.454h-1.032l.724-4.583a.57.57 0 0 1 .563-.481h.473c1.235 0 2.4 0 3.002.704.359.42.469 1.044.332 1.906zM66.654 13.075h-3.275a.57.57 0 0 0-.563.481l-.146.916-.229-.332c-.709-1.029-2.29-1.373-3.868-1.373-3.619 0-6.71 2.741-7.312 6.586-.313 1.918.132 3.752 1.22 5.03.998 1.177 2.426 1.666 4.125 1.666 2.916 0 4.533-1.875 4.533-1.875l-.146.91a.57.57 0 0 0 .562.66h2.95a.95.95 0 0 0 .939-.804l1.77-11.208a.566.566 0 0 0-.56-.657zm-4.565 6.374c-.316 1.871-1.801 3.127-3.695 3.127-.951 0-1.711-.305-2.199-.883-.484-.574-.668-1.392-.514-2.301.295-1.855 1.805-3.152 3.67-3.152.93 0 1.686.309 2.184.892.499.589.697 1.411.554 2.317zM84.096 13.075h-3.291a.955.955 0 0 0-.787.417l-4.539 6.686-1.924-6.425a.953.953 0 0 0-.912-.678H69.41a.57.57 0 0 0-.541.754l3.625 10.638-3.408 4.811a.57.57 0 0 0 .465.9h3.287a.949.949 0 0 0 .781-.408l10.946-15.8a.57.57 0 0 0-.469-.895z"></path>
                <path fill="#179BD7" d="M94.992 6.749h-6.84a.95.95 0 0 0-.938.802l-2.767 17.537a.57.57 0 0 0 .563.658h3.51a.665.665 0 0 0 .656-.563l.785-4.971a.95.95 0 0 1 .938-.803h2.164c4.506 0 7.105-2.18 7.785-6.5.307-1.89.012-3.375-.873-4.415-.971-1.141-2.694-1.745-4.983-1.745zm.789 6.405c-.373 2.454-2.248 2.454-4.063 2.454h-1.031l.726-4.583a.567.567 0 0 1 .562-.481h.474c1.233 0 2.399 0 3.002.704.358.42.467 1.044.33 1.906zM115.434 13.075h-3.272a.566.566 0 0 0-.562.481l-.146.916-.229-.332c-.709-1.029-2.289-1.373-3.867-1.373-3.619 0-6.709 2.741-7.312 6.586-.312 1.918.131 3.752 1.22 5.03 1 1.177 2.426 1.666 4.125 1.666 2.916 0 4.532-1.875 4.532-1.875l-.146.91a.57.57 0 0 0 .563.66h2.949a.95.95 0 0 0 .938-.804l1.771-11.208a.57.57 0 0 0-.564-.657zm-4.565 6.374c-.314 1.871-1.801 3.127-3.695 3.127-.949 0-1.711-.305-2.199-.883-.483-.574-.666-1.392-.514-2.301.297-1.855 1.805-3.152 3.67-3.152.93 0 1.686.309 2.184.892.501.589.699 1.411.554 2.317zM119.295 7.23l-2.807 17.858a.569.569 0 0 0 .562.658h2.822c.469 0 .866-.34.938-.803l2.769-17.536a.57.57 0 0 0-.562-.659h-3.16a.571.571 0 0 0-.562.482z"></path>
              </svg>
            </div>
        </div>
        
      </div>
    @endif
    <br>
    <!-- end -->
    
    <!--- Add money to wallet through Stripe  -->
    @if($wallet_settings->stripe_enable == 1)
      <div class="mt-2 shadow-sm card">
        
        <div class="card-body">
          <h5 class="card-title">{{ __("Pay with STRIPE") }}
          </h5>
          <p class="card-text">
          
        </p>
          <div class="row">
            <div class="col-md-6 col-sm-6">
              <div class="card-wrapper"></div>
              <div class="form-container active">
                
              </div>
            </div>
            <div class="col-md-6 col-sm-6">
              <form method="POST" action="{{ route('wallet.add.using.stripe') }}" id="stripe-form" class="StripeCard">
                @csrf
              

                <div class="form-group">
                  <input class="form-control" placeholder="{{__('Full name')}}" type="text" name="name">
                  @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                  @endif
                </div>
                <div class="col-lg-12 col-md-12">
                  <div class="form-group mb-3" id="card-number-field">
                      <label class="form-label" for="cardNumber">Card Number</label>
                      <div id="card-number-element" class="form-control"></div>
                  </div>
              </div>
              <div class="col-lg-6 col-md-6">
                  <div class="form-group mb-3" id="expiry">
                      <label class="form-label">{{ __('Expiration Date') }}</label>
                      <div id="card-expiry-element" class="form-control"></div>
                  </div>
              </div>
              <div class="col-lg-6 col-md-6">
                  <div class="form-group CVV mb-3">
                      <label class="form-label" for="cvv">{{ __('CVV') }}</label>
                      <div id="card-cvc-element" class="form-control"></div>
                  </div>
              </div>
              <div id="card-errors" role="alert"></div>

                {{-- <div class="form-group col-md-6" id="card-number-field">
                  <label for="cardNumber">Card Number</label>
                  <div id="card-number-element" class="form-control"></div>
                </div>
                <div class="form-group col-md-6" id="expiry">
                  <label>Expiration Date</label>
                  <div id="card-expiry-element" class="form-control"></div>
                </div>
                <div class="form-group CVV col-md-6">
                    <label for="cvv">CVV</label>
                    <div id="card-cvc-element" class="form-control"></div>
                </div> --}}
                  
                <input type="hidden" class="form-control" name="amount" value="{{ $amount }}">
                
                <div class="form-group">
                  <button title="{{__('Click to complete your payment !')}}" type="submit" class="btn btn-primary btn-lg btn-block" id="confirm-purchase"> {{ __('ADD') }} <i class="{{ $currency_symbol }}"></i>{{ $amount }}</button>
                </div>
              </form>
            </div>
            
          </div>
        </div>
        
      </div>
    @endif

    <!-- end -->
       
    </div>
  </div>
</section>
@endsection
@section('custom-script')
<script src="{{ url('/js/card.js') }}"></script>
<script>
  "use strict";

  new Card({
    form: document.querySelector('#credit-card'),
    container: '.card-wrapper'
  });
</script>

<script src="https://js.stripe.com/v3/"></script>
<script>var stripeKey = Stripe("{{ env('STRIPE_KEY') }}")</script>
<script src="{{ url('js/stripe.js') }}"></script>
@endsection