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
    
    @auth
        

        <div class="container">

        <h1 class="text-colored text-center font-weight-bold mt-4 mb-4"> Modifica profilo </h1>

        <form method="POST" action="{{ route('admin.users.update', $user) }}"
        enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right text-colored">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                    <input id="email" 
                    type="email" 
                    class="form-control @error('email') is-invalid @enderror" 
                    name="email" 
                    value="{{ old('email', $user->email) }}" 
                    required autocomplete="email" autofocus
                    >

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row" accept = 'image/jpeg , image/jpg, image/gif, image/png' >
                <label for="image" class="col-md-4 col-form-label text-md-right text-colored">{{ __('Immagine del profilo') }}</label>

                <div class="col-md-6">
                    
                    <input id="image" 
                    type="file" 
                    class="form-control upload-file @error('image') is-invalid @enderror" 
                    name="image" 
                    value="{{ old('image', $user->name) }}" 
                    autocomplete="image" autofocus
                    value=""
                    >

                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row" accept = 'cv/jpeg , cv/jpg, cv/gif, cv/png, cv/pdf' >
                <label for="cv" class="col-md-4 col-form-label text-md-right text-colored">{{ __('Curriculum vitae') }}</label>

                <div class="col-md-6">
                    
                    <input id="cv" 
                    type="file" 
                    class="form-control upload-file @error('cv') is-invalid @enderror" 
                    name="cv" 
                    value="{{ old('cv', $user->name) }}" 
                    autocomplete="cv" autofocus
                    value=""
                    >

                    @error('cv')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right text-colored">{{ __('Name') }}</label>

                <div class="col-md-6">

                        <input id="name" 
                        type="text" class="form-control @error('name') is-invalid @enderror " 
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
                <label for="lastname" class="col-md-4 col-form-label text-md-right text-colored">{{ __('Lastname') }}</label>

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
                <label for="address" class="col-md-4 col-form-label text-md-right text-colored">{{ __('Address') }}</label>

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
                <label for="city" class="col-md-4 col-form-label text-md-right text-colored">{{ __('City') }}</label>

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

            <div class="form-group row">
                <label for="description_job" class="col-md-4 col-form-label text-md-right text-colored">{{ __('Descrizione') }}</label>

                <div class="col-md-6 mb-4">
                    <textarea id="description_job" 
                    type="text" 
                    class="form-control @error('description_job') is-invalid @enderror" 
                    name="description_job" >{{ old('description_job', $user->description_job) }}</textarea>

                    @error('description_job')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <section class="row-custom ">

                <div class="form-group mt-4 text-colored ">
                    <label for="categories" class="d-block font-weight-bold grandezza-font-cat-skil ml-2">Le categorie </label>
                    
                    @foreach ($categories as $category)
                    <div class="input-custom">
                        <input 
                        class="checkbox-custom mb-2"
                        type="checkbox" 
                        value="{{ $category->id}}"
                        name="categories[]"
                        id="category{{ $loop->iteration }}"
            
                        @if (!$errors->any() && $user->categories->contains($category->id) )
                        checked
                        @elseif ($errors->any() && in_array($category->id, old('categories', [])))
                        checked
                        @endif>
                        <label class="mr-3 d-flex" for="tag{{ $loop->iteration }}">{{$category->name}}</label>
                    </div>
                    @endforeach
                </div>
        
                <div class="form-group  mt-4">
                    <label for="skills" class="d-block text-colored font-weight-bold grandezza-font-cat-skil ml-2">Le mie skill </label>
        
                    @foreach ($skills as $skill)
                    <div class="input-custom">
                        <input 
                        class="checkbox-custom  mb-2"
                        type="checkbox" 
                        value="{{ $skill->id}}"
                        name="skills[]"
                        id="skill{{ $loop->iteration }}"
            
                        @if (!$errors->any() && $user->skills->contains($skill->id) )
                        checked
                        @elseif ($errors->any() && in_array($skill->id, old('skills', [])))
                        checked
                        @endif>
                        <label class="mr-3" for="tag{{ $loop->iteration }}">{{$skill->name}}</label>
                    </div>
                    @endforeach

                </div>
                <button type="submit" class="btn btn-freelance mr-3" onclick="return confirm('Le tue modifiche sono state salvate correttamente')">
                    Salva
                </button>
                </form>
            </section>

            <section class="d-flex justify-content-between text-colored row-custom mt-5">
            
                <form onsubmit="return confirm('Confermi di voler eliminare il tuo account?')" 
                action="{{ route('admin.users.destroy', $user) }}" method="POST">
                @csrf
                @method('DELETE')
                    <button type="submit" class="btn btn-delete" onclick="return confirm('Vuoi eliminare il tuo profilo?')">
                    Elimina Profilo
                    </button>
                </form>

            </section>
        </div>
    @endauth
    
  
@endsection