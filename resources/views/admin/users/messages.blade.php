@extends('layouts.app')

@section('content')

  <div class="container">
    
   <div class="main-section">
     @if (session('deleted'))
        <div class="alert alert-danger" role="alert">
            {{ session('deleted') }}
        </div>
     @endif

     <div class="title-message my-3 d-flex justify-content-between align-items-center">
      
        <a href=" {{route('admin.index')}} ">   <i class="fas fa-arrow-circle-left"></i> </a>
      
        <h1 class="text-center"> I tuoi messaggi</h1>
        <p></p>

     </div>
   

      @if ($messageExists)
      
       @foreach ($messages as $message )
        <div class="box-message">

            <div class="box-title-message d-flex justify-content-between">
              <p class="">{{ $message->name_sender }} </p>
              <div class="right-title-box-message d-flex justify-content-between">
                <p>{{ $message->created_at }}</p>
                {{-- <span><i class="fas fa-trash-alt"></i> </span>     --}}
                
         
                  <form onsubmit="return confirm('Confermi eliminazione del messaggio di {{ $message->name_sender }} ?')" 
                      action= "{{ route('admin.deleteMessage', $message) }}" method="POST">
                      @csrf
                      @method('DELETE')
                     <button type="submit"><i class="fas fa-trash-alt"></i> </button>  
                  </form>
         
                

              </div>
            
            </div>

            <div class="box-body-message">
              <strong>{{ $message->email_sender }}</strong> 
              <p class="py-3">{{ $message->text }}</p>
            </div>
         
         </div>
        @endforeach

       @else
         <p>Non ci sono messaggi</p>
       @endif
       {{ $messages->links() }}
     </div>
    
  </div>
    
  
@endsection