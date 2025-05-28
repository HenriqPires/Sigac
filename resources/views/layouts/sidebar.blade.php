<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SIGAC') }}</title>

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    {{-- App CSS via Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            overflow-x: hidden;
        }
        .sidebar {
            min-height: 100vh;
            background-color: #198754;
        }
        .sidebar .nav-link,
        .sidebar .nav-link i {
            color: white !important;
        }
        .sidebar .nav-link.active {
            background-color: #157347;
            font-weight: bold;
        }
        .content {
            margin-left: 220px;
        }
    </style>
</head>
<body>

    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar p-3 position-fixed" style="width: 220px;">
            <h4 class="text-white">SIGAC</h4>
            <hr class="text-white">
            <ul class="nav nav-pills flex-column mb-auto">
                <li><a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a></li>
                <li><a href="{{ route('cursos.index') }}" class="nav-link"><i class="bi bi-book-fill me-2"></i>Cursos</a></li>
                <li><a href="{{ route('turmas.index') }}" class="nav-link"><i class="bi bi-people-fill me-2"></i>Turmas</a></li>
                <li><a href="{{ route('eixos.index') }}" class="nav-link"><i class="bi bi-diagram-3-fill me-2"></i>Eixos</a></li>
                <li><a href="{{ route('categorias.index') }}" class="nav-link"><i class="bi bi-tags-fill me-2"></i>Categorias</a></li>
                <li><a href="{{ route('documentos.index') }}" class="nav-link"><i class="bi bi-file-earmark-text-fill me-2"></i>Documentos</a></li>
                <li><a href="{{ route('alunos.index') }}" class="nav-link"><i class="bi bi-person-lines-fill me-2"></i>Alunos</a></li>
                <li><a href="{{ route('nivels.index') }}" class="nav-link"><i class="bi bi-layers-fill me-2"></i>Níveis</a></li>
                
            </ul>
           <hr class="text-white">
            <div class="text-white">
                <strong>{{ Auth::user()->name }}</strong>
                <form method="POST" action="{{ route('logout') }}" class="mt-2">
                    @csrf
                    <button class="btn btn-sm btn-light w-100" type="submit"><i class="bi bi-box-arrow-right me-1"></i>Sair</button>
                </form>
            </div>
        </div>

        <!-- Page Content -->
        <div class="content flex-grow-1 p-4">
            @hasSection('header')
                <div class="mb-4">
                    <h2 class="fw-bold">@yield('header')</h2>
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>