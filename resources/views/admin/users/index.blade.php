@extends('admin.admin')

@section('title', 'Gestion des utilisateurs')

@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{ route('admin.user.create') }}" class="btn btn-primary">Ajouter un utilisateur</a>
    </div>
    

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Mail</th>
                <th class="text-end">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a href="{{ route('admin.user.edit', $user) }}" class="btn btn-primary">Editer</a>
                            <form action="{{ route('admin.user.destroy', $user)}}" method="post">
                                @csrf
                                @method("delete")
                                <button class="btn btn-danger">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
