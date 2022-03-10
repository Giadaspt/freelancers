@extends('layouts.app')

@section('content')

{{-- <h1> {{$sponsorships}} </h1> --}}


  <div class="container color-font font-weight-bold">
    
    @if (isset($_GET['base']))
    <div>
      <h1 class="mt-4 mb-4">Riepilogo acquisto sponsorship {{ $sponsorships[0]->name }}</h1>
      <h4>
        <span class="font-weight-bold"> 
          Prezzo:
        </span>
        {{$sponsorships[0]->price}} &#8364
      </h4>

      <h4>
        <span class="font-weight-bold">
          Durata:
        </span>
        {{$sponsorships[0]->duration}} ore
      </h4>

      <h4>
        Se acquisti ora il pacchetto durerà fino a {{$sponsorships[0]->duration}} ore
      </h4>
    </div>
    @endif

    @if (isset($_GET['premium']))
    <div>
      <h1 class="mt-4 mb-4">Riepilogo acquisto sponsorship {{ $sponsorships[1]->name }}</h1>
      <h4>
        <span class="font-weight-bold"> 
          Prezzo:
        </span>
        {{$sponsorships[1]->price}} &#8364
      </h4>

      <h4>
        <span class="font-weight-bold">
          Durata:
        </span>
        {{$sponsorships[1]->duration}} ore
      </h4>

      <h4>
        Se acquisti ora il pacchetto durerà fino a {{$sponsorships[1]->duration}} ore
      </h4>
    </div>
    @endif

    @if (isset($_GET['elite']))
    <div>
      <h1 class="mt-4 mb-4">Riepilogo acquisto sponsorship {{ $sponsorships[2]->name }}</h1>
      <h4>
        <span class="font-weight-bold"> 
          Prezzo:
        </span>
        {{$sponsorships[2]->price}} &#8364
      </h4>

      <h4>
        <span class="font-weight-bold">
          Durata:
        </span>
        {{$sponsorships[2]->duration}} ore
      </h4>

      <h4>
        Se acquisti ora il pacchetto durerà fino a {{$sponsorships[2]->duration}} ore
      </h4>
    </div>
    @endif
    

    <form method="POST" action="{{route('admin.updateSponsorship', $user)}}"
     enctype="multipart/form-data" >  
      @csrf
      @method('PUT')
      
      <div class="d-flex justify-content-center align-items-center"></div>
      
      <div id="dropin"></div>

      <div class="mb-3">

        {{-- @foreach ($sponsorships as $sponsorship) --}}
            
          <span class="d-inline-block mr-3">
            <input   
           
         
             name="sponsorships[]"
             type="radio" 
             id="sponsorship0" 
             value="{{ $sponsorships[0]->id }}"
             hidden

             @if (isset($_GET['base']))
              checked
             @endif
           

             {{-- @if (!$errors->any() && $user->sponsorships->contains($sponsorship->id))
                 checked
             @elseif($errors->any() && in_array($sponsorship->id, old('sponsorship', [])) )
                 checked
             @endif --}}
            
             >
          </span>


          <span class="d-inline-block mr-3">
            <input   
           
         
             name="sponsorships[]"
             type="radio" 
             id="sponsorship1" 
             value="{{ $sponsorships[1]->id }}"
             hidden

             @if (isset($_GET['premium']))
              checked
             @endif
           

             {{-- @if (!$errors->any() && $user->sponsorships->contains($sponsorship->id))
                 checked
             @elseif($errors->any() && in_array($sponsorship->id, old('sponsorship', [])) )
                 checked
             @endif --}}
             >
          </span>

          <span class="d-inline-block mr-3">
            <input   
           
             name="sponsorships[]"
             type="radio" 
             id="sponsorship2" 
             value="{{ $sponsorships[2]->id }}"
             hidden

             @if (isset($_GET['elite']))
              checked
             @endif
           
             {{-- @if (!$errors->any() && $user->sponsorships->contains($sponsorship->id))
                 checked
             @elseif($errors->any() && in_array($sponsorship->id, old('sponsorship', [])) )
                 checked
             @endif --}}        
             >
          </span>

        {{-- @endforeach --}}
 
      </div>
      
      <input id="nonce" name="payment_method_nonce" type="hidden"/>
      <div class="d-flex justify-content-center align-items-center">
          <a class="mr-4" href="{{route('admin.sponsorships.index')}}">Annulla transazione</a>
          <button class="btn btn-freelance " type="submit" onclick="return confirm('Acquisto confermato')">Conferma acquisto</button>
      </div>
    </form>
  
    <div class="container">
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
              Swal.fire({
                text: "Pagamento completato con successo",
                icon: "success",
                buttonsStyling: false,
                confirmButtonText: "Ok",
                customClass: {
                confirmButton: "btn btn-primary"
                }
              });
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