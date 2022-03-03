@extends('layouts.app')

@section('content')

  <div class="container text-colored">
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
        </div>
      </section>

      <div class="cv-file mt-4">
        <embed src="{{ asset('storage/' . $user->cv) }}" alt="">
      </div>
    @endauth


  </div>
  
@endsection