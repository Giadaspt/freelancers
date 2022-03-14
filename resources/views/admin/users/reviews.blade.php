@extends('layouts.app')

@section('content')

<div class="container">
  <div class="main-section">
    @if (session('deleted'))
    <div class="alert alert-danger" role="alert">
        {{ session('deleted') }}
    </div>
 @endif

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
               {{-- <span><i class="fas fa-trash-alt"></i> </span>     --}}

               <form onsubmit="return confirm('Confermi eliminazione della recensione di {{ $review->author_name }} ?')" 
                  action= "{{ route('admin.deleteReviews', $review) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit"><i class="fas fa-trash-alt"></i> </button>  
              </form>
                   
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
      <h4 class="text-center mt-5 text-dark">Non ci sono recensioni</h4>
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