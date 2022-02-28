@extends('layouts.app')

@section('content')

    @if ($errors->any())
    <div class="alert alert-danger" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
        <li> {{$error}} </li>
        @endforeach
    </ul>
    </div>
    @endif


  <div class="container">
      <form method="POST" action="{{ route('admin.users.update', $user) }}"
      enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" 
                type="email" 
                class="form-control @error('email') is-invalid @enderror" 
                name="email" 
                value="{{ old('email', $user->email) }}" 
                required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input id="name" 
                type="text" class="form-control @error('name') is-invalid @enderror" 
                name="name" 
                value="{{ old('name', $user->name) }}" 
                required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
      
        <div class="form-group row">
            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Lastname') }}</label>

            <div class="col-md-6">
                <input id="lastname" 
                type="text" 
                class="form-control @error('lastname') is-invalid @enderror" 
                name="lastname" 
                value="{{ old('lastname', $user->lastname) }}" 
                required autocomplete="lastname" autofocus>

                @error('lastname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

            <div class="col-md-6">
                <input id="address" 
                type="text" 
                class="form-control @error('address') is-invalid @enderror" 
                name="address" 
                value="{{ old('address', $user->address) }}" 
                required autocomplete="address" autofocus>

                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        
        <div class="form-group row">
            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

            <div class="col-md-6">
                <input id="city" 
                type="text" 
                class="form-control @error('city') is-invalid @enderror" 
                name="city" 
                value="{{ old('city', $user->city) }}" 
                required autocomplete="city" autofocus>

                @error('city')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row" accept = 'image/jpeg , image/jpg, image/gif, image/png' >
            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Immagine del profilo') }}</label>

            <div class="col-md-6">
                <input id="image" 
                type="file" class="form-control @error('image') is-invalid @enderror" 
                name="image" 
                value="{{ old('image', $user->name) }}" 
                autocomplete="image" autofocus>

                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-check form-switch row">
            @foreach ($categories as $category)
                <button type="button" 
                class="btn btn-outline-primary  active"
                @if (!$errors->any() && $user->categories->contains($category->id) )
                active
                @elseif ($errors->any() && in_array($category->id, old('categories', [])))
                active
                @endif

                data-toggle="button" 
                aria-pressed="false" 
                autocomplete="off"
                value="{{ $category->id}}"
                id="category{{ $loop->iteration }}"
                name="categories[]"
              >
                    {{ $category->name}}
                </button>

                
            @endforeach
        </div>

        <div class="form-group row">
            @foreach ($skills as $skill)
            <input type="checkbox" 
            value="{{ $skill->id}}"
            name="skills[]"
            id="skill{{ $loop->iteration }}"
   
            @if (!$errors->any() && $user->skills->contains($skill->id) )
              checked
            @elseif ($errors->any() && in_array($skill->id, old('skills', [])))
              checked
            @endif>
            <label class="mr-3" for="tag{{ $loop->iteration }}">{{$skill->name}}</label>
           @endforeach
        </div>

       

        <button type="submit" class="btn btn-primary">
          Salva
        </button>

      </form>
      <form onsubmit="return confirm('Confermi di voler eliminare il tuo account?')" 
      action="{{ route('admin.users.destroy', $user) }}" method="POST">
      @csrf
      @method('DELETE')
      
        <button type="submit" class="btn btn-danger">
          Elimina Profilo
        </button>
      </form>
  </div>
  
@endsection