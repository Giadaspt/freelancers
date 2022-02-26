@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <aside>
                <a href="{{ route('admin.users.show', $user) }}">Vedi profilo</a>
                <a href="{{ route('admin.users.edit', $user) }}">Modifica profilo</a>
                <a href="{{ route('admin.message') }}">Messaggi</a>
                <a href="{{ route('admin.reviews') }}">Recensioni</a>
            </aside>
        </div>

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

                      
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
