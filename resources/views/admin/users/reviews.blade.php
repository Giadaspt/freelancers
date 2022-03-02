@extends('layouts.app')

@section('content')

<div class="container">
  <div class="main-section">

    <div class="title-review my-3 d-flex justify-content-between align-items-center">
     
       <a href=" {{route('admin.index')}} ">   <i class="fas fa-arrow-circle-left"></i> </a>
     
       <h1 class="text-center"> Le tue recensioni</h1>
       <p></p>

    </div>
  

     @if ($reviewExists)
     
      @foreach ($reviews as $review )
       <div class="box-review">

           <div class="box-title-review d-flex justify-content-between">
             <p class="">{{ $review->author_name }} </p>
             <div class="right-title-box-review d-flex justify-content-between">
               <p>{{ $review->created_at }}</p>
               <span><i class="fas fa-trash-alt"></i> </span>    
               {{-- <i>
                  <form onsubmit="return confirm('Confermi eliminazione del messaggio?')" 
                      action= "{{ route('admin.players.destroy', $player) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger"> DELETE</button> 
                  </form>
               </i>       --}}
             </div>
           
           </div>

           <div class="box-body-review">
             @for ($i = 0; $i <5; $i++)
               <i class="fa-star {{ $i < $review->vote ? 'fas' : 'far' }}  "> </i> 
             @endfor
            
             <p class="py-3">{{ $review->text }}</p>
           </div>
        
        </div>
       @endforeach

      @else
        <p>Non ci sono messaggi</p>
      @endif
      {{ $reviews->links() }}
    </div>
   
 </div>
   





  {{-- <div class="container">

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

  </div> --}}
  
@endsection