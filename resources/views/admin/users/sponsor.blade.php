@extends('layouts.app')

@section('content')

  <section class="container text-center mb-5">
    <h1>Sponsorship</h1>

    <p> 
      Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minima incidunt odit dolorum obcaecati aliquid libero tenetur dolore mollitia numquam voluptas vel voluptate corrupti sapiente enim aperiam ut, iusto nobis itaque qui! Accusantium sapiente provident consequuntur, mollitia optio ea a, sint possimus minima incidunt deserunt repellendus, officia ad consequatur quia omnis.

    </p>
  </section>
  {{-- {{ route('admin.sponsorships.update', $sponsor) }} --}}

  <div class="container  mt-5">
    <form class="d-flex justify-content-between" action="" method="POST">
      @csrf
      {{-- @method('PUT') --}}

        @foreach ($sponsors as $sponsor)
          
            <div class="card d-flex" style="width: 18rem;">
              <div class="card-body">
      
                <h5 class="card-title">{{$sponsor->name}}</h5>
          
                <h5>
                  Prezzo:
                  {{$sponsor->price}}
                </h5>
          
                <h5>
                  Durata:
                  {{$sponsor->duration}}
                </h5>
                
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="{{$sponsor->id}}">
              </div>
            </div>
            <button class="btn btn-info">
              <a href="{{ route('admin.sponsorships.show', $sponsor) }}" id="{{$sponsor->id}}" class="card-link">Acquista</a>
          </button>
            @endforeach
            
            
          </form>
  </div>

  <section class="container mt-5 text-center">
    <h2 class="mt-5">Compara i pacchetti</h2>

    <div class="table-responsive">
      <table class="table text-center">
        <thead>
          <tr>
            <th style="width: 34%;"></th>

            @foreach ($sponsors as $sponsor)
              
            <th style="width: 22%;">{{ $sponsor->name }}</th>
            @endforeach
          </tr>
        </thead>
        <tbody>
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
            <th scope="row" class="text-start">Sharing</th>
            <td></td>
            <td class="bi" width="24" height="24">&#10003</td>
            <td class="bi" width="24" height="24">&#10003</td>
          </tr>
          <tr>
            <th scope="row" class="text-start">Unlimited members</th>
            <td></td>
            <td class="bi" width="24" height="24">&#10003</td>
            <td class="bi" width="24" height="24">&#10003</td>
          </tr>
          <tr>
            <th scope="row" class="text-start">Extra security</th>
            <td></td>
            <td></td>
            <td class="bi" width="24" height="24">&#10003</td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>
  
@endsection