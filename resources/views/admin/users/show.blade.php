@extends('layouts.app')

@section('content')

  <div class="container text-colored">

    {{-- <h1> {{$user->sponsorships->id}} </h1> --}}
    @auth
      <section class="profile_details"> 
        <div class="d-flex align-items-center">
          <div class="image-box mr-3">
            <img class="round-image mr-3" width="100" src="{{ asset('storage/' . $user->image) }}" alt="">
          </div>

          <h3 class="mr-3">{{ $user->name }}</h3>
 
          <h3 class="mr-2">{{ $user->lastname }}</h3>

          <span class="ml-4">
            <button class="btn btn-freelance btn-modify-profile">
              <a href="{{ route('admin.users.edit', $user) }}"> Modifica profilo</a>
            </button>
          </span>
        </div>


        <div class="mt-3">
          <h5>{{ $user->email }}</h5>
      
          <h5>{{ $user->address }}</h5>
          <h5>{{ $user->city }}</h5>

          <div class="mt-3 mb-3">
            <h5 class="mr-2 font-weight-bold">Me ed il mio lavoro </h5>
            <p>{{ $user->description_job }}</p>
          </div>

          <div class="d-flex">
            <h5 class="mr-2 font-weight-bold">Mi occupo di: </h5>

            @forelse ($user->categories as $category)
                <p class="mr-2">
                  {{ $category->name }},
                </p>
            @empty
              - 
            @endforelse
          </div>
  
          <div class="d-flex">
            <h5 class="mr-2 font-weight-bold">I miei punti di forza sono: </h5>

            @forelse ($user->skills as $skill)
                <p class="mr-2">
                  {{ $skill->name }},
                </p>
            @empty
              - 
            @endforelse
          </div>
 
          <div class="sponsored-box">

            {{-- <h2> {{$user->sponsorships}} </h2> --}}

              @if(count($user->sponsorships) === 0)
                  <p>Il tuo profilo non è sponsorizzato</p>    
               <a href="{{ route('admin.sponsorships.index') }}" class="btn btn-success"> Sponsorizza il profilo </a>    
                  @elseif($user->sponsorships[count($user->sponsorships) - 1]->name === 'Base' && $packBaseExpiration < $date_now) 
                  
                  <p class="text-danger">La tua sponsorizzazione è terminata il {{$packBaseExpiration }}</p> 
                  <a href="{{ route('admin.sponsorships.index') }}" class="btn btn-success"> Sponsorizza il profilo </a>
                  @elseif($user->sponsorships[count($user->sponsorships) - 1]->name === 'Premium' && $packPremiumExpiration < $date_now) 
                  <p class="text-danger">La tua sponsorizzazione è terminata il {{$packPremiumExpiration }}</p> 
                  <a href="{{ route('admin.sponsorships.index') }}" class="btn btn-success"> Sponsorizza il profilo </a>
                  @elseif($user->sponsorships[count($user->sponsorships) - 1]->name === 'Elite' && $packEliteExpiration < $date_now) 
                  <p class="text-danger">La tua sponsorizzazione è terminata il {{$packEliteExpiration }} </p> 
                  <a href="{{ route('admin.sponsorships.index') }}" class="btn btn-success"> Sponsorizza il profilo </a>
                @else
                  <h3 class="text-success">IL TUO PROFILO E' SPONSORIZZATO</h3> 
                  <h3>pacchetto: <strong class="text-primary">{{ $user->sponsorships[count($user->sponsorships) - 1]->name }} </strong> </h3>
                  <p>Data di inizio:   {{ $user->sponsorships[count($user->sponsorships) - 1]->pivot->created_at }} </p>

                  @if($user->sponsorships[count($user->sponsorships) - 1]->name === 'Base')
                  <p>Data di scadenza: {{$packBaseExpiration}} </p>
                  @elseif($user->sponsorships[count($user->sponsorships) - 1]->name === 'Premium')
                  <p>Data di scadenza: {{$packPremiumExpiration}} </p>
                  @elseif($user->sponsorships[count($user->sponsorships) - 1]->name === 'Elite')
                  <p>Data di scadenza: {{$packEliteExpiration}} </p>
                  @endif
               @endif
            
          </div>

      

        </div>
      </section>

      <div class="cv-file mt-4">
        <embed src="{{ asset('storage/' . $user->cv) }}" alt="">
      </div>
    @endauth


  </div>
  
@endsection