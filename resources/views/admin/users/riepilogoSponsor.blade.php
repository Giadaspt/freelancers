@extends('layouts.app')

@section('content')


  <div class="container color-font font-weight-bold">
    <h1 class="mt-4 mb-4">Riepilogo acquisto sponsorship {{ $sponsor->name }}</h1>
    <div>
      <h4>
        <span class="font-weight-bold"> 
          Prezzo:
        </span>
        {{$sponsor->price}} &#8364
      </h4>
      <h4>
        <span class="font-weight-bold">
          Durata:
        </span>
        {{$sponsor->duration}} ore
      </h4>

      <h4>
        Se acquisti ora il pacchetto durerà fino a {{$sponsor->duration}} ore
      </h4>
    </div>

    <form method="POST" id="payment-form" action="{{route('admin.index', $sponsor)}}">  
      @csrf
      @method('GET')
      
      <div class="d-flex justify-content-center align-items-center"></div>
      
      <div id="dropin"></div>
      
      <input id="nonce" name="payment_method_nonce" type="hidden"/>
      <div class="d-flex justify-content-center align-items-center">
          <a class="mr-4" href="{{route('admin.sponsorships.index')}}">Annulla transazione</a>
          <button class="btn btn-freelance " type="submit">Conferma acquisto</button>
      </div>
    </form>
  
    <div class="">
      <script src="https://js.braintreegateway.com/web/dropin/1.13.0/js/dropin.min.js"></script>
      <script>
        var form = document.querySelector('#payment-form');
        braintree.dropin.create({
          authorization: 'sandbox_tv8hnj3n_sff9x6cz2smm8qhq',
          selector: '#dropin',
        }, function (createErr, instance) {
          if (createErr) {
            console.log('Create Error', createErr);
            return;
          }
          form.addEventListener('submit', function (event) {
            event.preventDefault();
            instance.requestPaymentMethod(function (err, payload) {
              if (err) {
                console.log('Request Payment Method Error', err);
                return;
              }
              // Add the nonce to the form and submit
              document.querySelector('#nonce').value = payload.nonce;
              form.submit();
            });
          });
        });
      </script>
    </div>
    <button class="btn btn-freelance  mr-2 mt-5">
      <a class="text-white" href=" {{ URL::previous() }} "> Indietro </a>
    </button>
  </div>


  
@endsection