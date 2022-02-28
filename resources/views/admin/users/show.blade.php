@extends('layouts.app')

@section('content')

  <div class="container">

    <div class="d-flex">
      <h1>Ciao {{ $user->name }}</h1>
      <span class="mt-2 ml-4">
        <button class="">
          <a href="{{ route('admin.users.edit', $user) }}"> Modifica</a>
        </button>
      </span>
    </div>
    <section class="profile_details">
      <div >
        <img width="100" src="{{ asset('storage/' . $user->image) }}" alt="">
      </div>
  
      <h3>{{ $user->name }}</h3>
      <h3>{{ $user->lastname }}</h3>
      <h3>{{ $user->email }}</h3>
      <h3>{{ $user->address }}</h3>
      <h3>{{ $user->city }}</h3>

     
      @forelse ($categories as $category)
          <h3 class="badge bg-warning text-white">
            {{ $category->name }}
          </h3>
      @empty
        - 
      @endforelse
      {{-- @dd($categories) --}}

      @forelse ($user->skills as $skill)
          <h3 class="badge bg-success text-white">
            {{ $skill->name }}
          </h3>
      @empty
        - 
      @endforelse
    </section>


  </div>
  
@endsection