<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <title>@yield('title') | Agence</title>
</head>
<body>

    @php
        $route = request()->route()->getName();
    @endphp

    <nav class="navbar navbar-expand-lg bg-primary navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Agence</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        {{-- rend élement actif si $route contient property --}}
                        <a href="{{ route('property.index') }}" @class(['nav-link', 'active' => str_contains($route, 'property.')])>Biens</a> 
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

</body>
</html>
