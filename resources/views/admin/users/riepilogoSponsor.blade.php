@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Riepilogo acquisto sponsorship {{ $sponsor->name }}</h1>
    <div>
      <h3>
        Pacchetto: {{$sponsor->name}}
      </h3>
      <h3>
        Prezzo: {{$sponsor->price}} euro
      </h3>
      <h3>
        Durata: {{$sponsor->duration}} ore
      </h3>
      <h3>
        Se acquisti ora il pacchetto durerà fino a {{$sponsor->duration}} ore
      </h3>
    </div>


    <button class="btn btn-primary mr-2">
      <a class="text-white" href=" {{ URL::previous() }} "> Indietro </a>
    </button>

  </div>

  
@endsection