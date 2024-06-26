@extends('admin.admin')

@section('title', $user->exists ? "Editer un utilisateur" : "Créer un utilisateur")

@section('content')

    <h1>@yield('title')</h1>

    <form class="vstack gap-2" action="{{ route($user->exists ? 'admin.user.update' : 'admin.user.store', $user) }}" method="post">

        @csrf
        @method($user->exists ? 'put' : 'post')

        @include('shared.input', ['class' => 'col', 'name' => 'name', 'label' => 'Nom', 'value' => $user->name])
        @include('shared.input', ['class' => 'col', 'name' => 'email', 'label' => 'Email', 'value' => $user->email])

        <div>
            <button class="btn btn-primary">
                @if($user->exists)
                    Modifier
                @else
                    Créer
                @endif
            </button>
        </div>

    </form>

@endsection
