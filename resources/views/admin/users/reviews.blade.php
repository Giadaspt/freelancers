@extends('layouts.app')

@section('content')

  <div class="container">

    @if ($reviewExists)
      @foreach ($reviews as $review )

            <p>{{ $review->author_name}}
              <span>{{ $review->created_at }}</span>
            </p>
            <p>Recensione: {{ $review->text }}</p>
            <p>Voto: {{ $review->vote }}</p>
      
      @endforeach
      @else
      <p>Non ci sono recensioni</p>
    @endif

  </div>
  
@endsection