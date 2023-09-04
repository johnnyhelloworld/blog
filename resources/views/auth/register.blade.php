@extends('base')

@section('title', 'S\'inscrire')

@section('content')

    <div class="mt-4 container">
        <h1>@yield('title')</h1>

        @include('shared.flash')

        <form method="post" action="{{ route('register') }}" class="vstack gap-3">
            @csrf
            @include('shared.input', ['type' => 'text', 'class' => 'col', 'name' => 'name', 'label' => 'Name'])
            @include('shared.input', ['type' => 'email', 'class' => 'col', 'name' => 'email', 'label' => 'Email'])
            @include('shared.input', ['type' => 'password', 'class' => 'col', 'name' => 'password', 'label' => 'Mot de passe'])
            @include('shared.input', ['type' => 'password', 'class' => 'col', 'name' => 'password_confirmation', 'label' => 'Confirmation du mot de passe'])
            <div>
                <button class="btn btn-primary">S'inscrire</button>
            </div>
        </form>
    </div>

@endsection
