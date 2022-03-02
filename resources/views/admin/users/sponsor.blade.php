@extends('layouts.app')

@section('content')

  <section class="container-title text-center mb-5">
    <h1 class="color-font">Sponsorship</h1>

    <p class="color-font"> 
      Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minima incidunt odit dolorum obcaecati aliquid libero tenetur dolore mollitia numquam voluptas vel voluptate corrupti sapiente enim aperiam ut, iusto nobis itaque qui! Accusantium sapiente provident consequuntur, mollitia optio ea a, sint possimus minima incidunt deserunt repellendus, officia ad consequatur quia omnis.

    </p>
  </section>
  {{-- {{ route('admin.sponsorships.update', $sponsor) }} --}}

  <div class="container mt-5">
    <form class="d-flex justify-content-between " action="" method="POST">
      @csrf
      {{-- @method('PUT') --}}

        @foreach ($sponsors as $sponsor)
          
            <a href="{{ route('admin.sponsorships.show', $sponsor) }}" class="card d-flex" style="width: 18rem;">
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
            </a>
            {{-- <button class="btn btn-info">
              <a href="{{ route('admin.sponsorships.show', $sponsor) }}" id="{{$sponsor->id}}" class="card-link">Acquista</a>
          </button> --}}
            @endforeach
            
            
          </form>
  </div>

  <section class="container mt-5 text-center color-font">
    <h2 class="font-weight-bold mt-5 mb-4">Compara i pacchetti</h2>

    <div class="table-responsive ">
      <table class="table text-center color-font">
        <thead class="color-font">
          <tr>
            <th style="width: 34%;"></th>

            @foreach ($sponsors as $sponsor)
              
            <th style="width: 22%;">{{ $sponsor->name }}</th>
            @endforeach
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
    <div class="d-flex justify-content-end mt-4">
      <button class="btn  btn-freelance mr-2">
        <a class="text-white" href=" {{ URL::previous() }} "> Indietro </a>
      </button>
    </div>
  </section>
  
@endsection