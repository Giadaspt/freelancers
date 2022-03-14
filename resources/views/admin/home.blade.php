@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card-user card mb-3">
                
                <div class="card-header user-card-header"><h4>ACCOUNT</h4></div>
                <div class="d-flex card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($user->image)

                        
                    <div class="box-img-dashboard">
                        <img src="{{ asset('storage/' . $user->image) }}" alt="{{$user->name}}" 
                         >       
                    </div>
                    @else
                        <img width="200"  src="{{ asset('storage/img/user.jpeg')}}" alt="immagine" style="border-radius: 50%">

                    @endif
                    <div class="user-list">
                        <h1>{{ $user->name }} {{ $user->lastname }}</h1>
                        <ul>
                            <li>{{$user->email}}</li>
                            <li>{{$user->city}}</li>
                            <li>{{$user->address}}</li>
                        </ul>                    
                    </div>
                </div>
                
            </div>
        </div>
        <div class="container d-flex justify-content-between mb-2">
            <div class="card-bg-color card dash-card text-center" style="width: 30%">
                <a href="{{ route('admin.users.show', $user) }}" class="card-body">
                    <div class="img">
                        <img width="100px" src=" {{asset('storage/img/show.png')}} " alt="">
                    </div>
                    <p class="pt-2">Vedi profilo</p>
                </a>
            </div>
            <div class="card dash-card text-center" style="width: 30%">
                <a href="{{ route('admin.users.edit', $user) }}" class="card-body">
                    <div class="img">
                        <img width="100px" src=" {{asset('storage/img/modifica.png')}} " alt="">
                    </div>
                  <p class="pt-2">Modifica profilo</p>

                </a>
            </div>
            <div class="card dash-card text-center" style="width: 30%">
                <a href="{{ route('admin.sponsorships.index') }}" class="card-body">
                    <div class="img">
                        <img width="100px" src=" {{asset('storage/img/sponsor.png')}} " alt="">
                    </div>
                  <p class="pt-2">Sponsorizza profilo</p>
                </a>
            </div>
        </div>
        <div class="container d-flex justify-content-between mb-2">
            @if ($lastMessage)
             <div class="card dash-message" style="width: 45%">
             
                <div class="card-body">
               
                  <h5 class="card-title">{{$lastMessage->name_sender}}</h5>
                  <h6 class="card-subtitle mb-2 text-muted">{{$lastMessage->email_sender}}</h6>
                  <p class="card-text">{{$lastMessage->text}}</p>
                  <a href="{{ route('admin.message') }}" class="card-link">Vedi tutti i messaggi <span class="badge badge-pill bg-primary align-text-bottom text-white px-2 py-1">{{$allMessages}}</span></a>
              
                </div>
                        
            </div>
            @endif
            @if ($lastReview)
            <div class="card dash-review" style="width: 45%">
               
                    
                <div class="card-body">
                  <h5 class="card-title">{{$lastReview->author_name}}</h5>
                  <h6 class="card-subtitle mb-2 text-muted">{{$lastReview->vote}}</h6>
                  <p class="card-text">{{$lastReview->text}}</p>
                  <a href="{{ route('admin.reviews') }}" class="card-link">Vedi tutte le recensioni <span class="badge badge-pill bg-primary align-text-bottom text-white px-2 py-1">{{$allReviews}}</span></a>                
                </div>        
             </div>   
            @endif        
        </div>
        <div class="container d-flex justify-content-between mt-1">
            <div class="card dash-statistiche text-dark" style="width: 30%; min-width: 200px; min-height: 200px">
                <div class="card-body d-flex justify-content-center align-items-center flex-column text-center" style="height: 100%">
                    <h5>MEDIA RECENSIONI:</h5>
                    <h2><a href="#" class="card-link text-dark">{{$avgReviews}}</a></h2>
                </div>
            </div>
            <div class="card dash-statistiche text-success" style="width: 30%; min-width: 200px; min-height: 200px">
                <div class="card-body d-flex justify-content-center align-items-center flex-column text-center" style="height: 100%">
                    <h5>RECENSIONI RICEVUTE:</h5>
                    <h2><a href="#" class="card-link text-success"> {{$allReviews}} </a></h2>
                </div>
            </div>
            <div class="card dash-statistiche text-info" style="width: 30%; min-width: 200px; min-height: 200px">
                <div class="card-body d-flex justify-content-center align-items-center flex-column text-center" style="height: 100%">
                    <h5>MESSAGGI RICEVUTI:</h5>
                    <h2><a href="#" class="card-link text-info">{{$allMessages}}</a></h2>
                </div>
            </div>
          
        
        </div>
    </div>
</div>
@endsection
