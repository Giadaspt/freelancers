@extends('layouts.app')

@section('content')

  <div class="container">
    @foreach ($messages as $message )
      <p>{{ $message->name_sender }}
        <span>{{ $message->created_at }}</span>
      </p>
      <p>{{ $message->email_sender }}</p>
      <p>{{ $message->text }}</p>
    @endforeach
  </div>
  
@endsection