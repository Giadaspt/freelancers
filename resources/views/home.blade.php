@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Il mio profilo') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container">
                        <h1>Ciao {{ $user->name }}</h1>

                        <div>
                            <label class="d-block" for="image"> Foto Profilo </label>
                            <input type="file">
                        </div>

                        <div class="mt-3">
                            <label for="name"> Nome </label>
                            <h5>{{ $user->name }}</h5>
                        </div>

                        <div class="mt-3">
                            <label for="lastname"> Cognome </label>
                            <h5>{{ $user->lastname }}</h5>
                        </div>

                        <div class="mt-3">
                            <label for="address"> Indirizzo </label>
                            <h5>{{ $user->address }}</h5>
                        </div>

                        <div class="mt-3">
                            <label for="city"> Città </label>
                            <h5>{{ $user->city }}</h5>
                        </div>

                        <div class="mt-3">
                            <label class="d-block" for="description_job"> Descrizione </label>
                            <textarea> </textarea>
                        </div>

                        <div class="mt-3">
                            @if ($user->image == '')
                                <label class="d-block" for="cv"> CV </label>
                                <input type="file">
                            @else
                                <img src="{{ asset($user->image) }}" alt="">
                            @endif
                        </div>

                        <button class="mt-5 btn btn-warning"> Modifica </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
