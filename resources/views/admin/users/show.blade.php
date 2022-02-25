@extends('layouts.app')

@section('content')

  <div class="container">
    <h1>ciao</h1>

    <p>{{ $user->name }}</p>
    <p>{{ $user->lastname }}</p>

    <button class="">
      <a href="{{ route('admin.users.edit', $user) }}"> Modifica</a>
     
    </button>
  </div>
  
@endsection