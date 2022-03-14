@extends('layouts.app')

@section('content')

  <section class="container-title text-center mb-5">
    <h1 class="color-font">SPONSORIZZA IL PROFILO</h1>

    <h3 class="color-font"> 
     Acquista un pacchetto tra i 3 proposti e il tuo profilo verrà messo in evidenza,  per tutto il tempo indicato, nella home page del sito.

    </h3>
  </section>
  {{-- {{ route('admin.sponsorships.update', $sponsor) }} --}}

  <div class="container mt-5">
    <form class="d-flex justify-content-between flex-wrap" action=" {{route('admin.editSponsorships', $user)}} " method="GET">
      @csrf
      {{-- @method('PUT') --}}

        {{-- @foreach ($sponsors as $sponsor) --}}
        <div class="container-pack bg-secondary d-flex flex-column align-items-center">
          <div class="card sponsor-card"> 
            <h3> {{$sponsors[0]->name}} </h3>
            <p>Prezzo: {{$sponsors[0]->price}} €</p>
            <p>Durata: {{$sponsors[0]->duration}} ore</p>
          </div>
          <input class="button-pack" type="submit" name="base" value="Acquista">
        </div>

        <div class="container-pack bg-info d-flex flex-column align-items-center">
           <div class="card sponsor-card">
                <h3> {{$sponsors[1]->name}} </h3>
                <p>Prezzo: {{$sponsors[1]->price}} €</p>
                <p>Durata: {{$sponsors[1]->duration}} ore</p>
            </div>
            <input class="button-pack" type="submit" name="premium" value="Acquista">
        </div>

        <div class="container-pack bg-warning d-flex flex-column align-items-center">
           <div class="card sponsor-card">
              <h3> {{$sponsors[2]->name}} </h3>
              <p>Prezzo: {{$sponsors[2]->price}} €</p>
              <p>Durata: {{$sponsors[2]->duration}} ore</p>
           </div>
            <input class="button-pack" type="submit" name="elite" value="Acquista">
        </div>
    

        


            {{-- <a href="{{ route('admin.editSponsorships', $user) }}" class="card sponsor-card d-flex" style="width: 18rem">
              <div class="card-body color-font ">
      
                <h3 class="card-title font-weight-bold ">{{$sponsor->name}}</h3>
          
                <h5>
                  <span class="font-weight-bold"> 
                    Prezzo:
                  </span>
                  {{$sponsor->price}} &#8364
                </h5>
          
                <h5>
                  <span class="font-weight-bold">
                    Durata:
                  </span>
                  {{$sponsor->duration}} ore
                </h5>
              </div>
            </a> --}}
            {{-- <button class="btn btn-info">
              <a href="{{ route('admin.sponsorships.show', $sponsor) }}" id="{{$sponsor->id}}" class="card-link">Acquista</a>
          </button> --}}
            {{-- @endforeach --}}
            
            
        </form>
  </div>

  <section class="container mt-5 text-center color-font">
    <h2 class="font-weight-bold mt-5 mb-4">Compara i pacchetti</h2>

    <div class="table-responsive ">
      <table class="table text-center color-font">
        <thead class="color-font">
          <tr>
            <th style="width: 34%;"></th>

        
              
            <th style="width: 22%;">{{ $sponsors[0]->name }}</th>
            <th style="width: 22%;">{{ $sponsors[1]->name }}</th>
            <th style="width: 22%;">{{ $sponsors[2]->name }}</th>
       
          </tr>
        </thead>
        <tbody class="color-font">
          <tr>
            <th scope="row" class="text-start">Reach People</th>
            <td class="bi" width="24" height="24">&#10003</td>
            <td class="bi" width="24" height="24">&#10003</td>
            <td class="bi" width="24" height="24">&#10003</td>
          </tr>
          <tr>
            <th scope="row" class="text-start">Boosted Posts</th>
            <td></td>
            <td class="bi" width="24" height="24">&#10003</td>
            <td class="bi" width="24" height="24">&#10003</td>
          </tr>

          <tr>
            <th scope="row" class="text-start">Priority</th>
            <td class="bi" width="24" height="24"></td>
            <td class="bi" width="24" height="24"></td>
            <td class="bi" width="24" height="24">&#10003</td>
          </tr>
          <tr>
            <th scope="row" class="text-start">In evidence longer</th>
            <td></td>
            <td class="bi" width="24" height="24">&#10003</td>
            <td class="bi" width="24" height="24">&#10003</td>
          </tr>
          
        </tbody>
      </table>
    </div>
    <div class="d-flex justify-content-start mt-4">
      <button class="btn btn-freelance mr-2">
        <a class="text-white" href=" {{ URL::previous() }} "> Indietro </a>
      </button>
    </div>
  </section>
  
@endsection