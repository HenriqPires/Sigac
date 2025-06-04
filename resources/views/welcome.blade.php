<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>SIGAC - Sistema de Gestão de Atividades Complementares</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
            color: #333;
            height: 100vh;
        }

        .central-box {
            background-color: #ffffff;
            color: #333;
            border-radius: 15px;
            padding: 40px 30px;
            max-width: 480px;
            margin: auto;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .central-box:hover {
            transform: translateY(-5px);
        }

        .central-box h1 {
            font-weight: 600;
            color: #198754;
        }

        .btn-custom {
            width: 100%;
            padding: 14px;
            font-size: 16px;
            border: none;
            transition: all 0.3s;
            color: #fff;
        }

        .btn-admin {
            background-color: #198754;
        }

        .btn-admin:hover {
            background-color: #157347;
        }

        .btn-aluno {
            background-color: #0d6efd;
        }

        .btn-aluno:hover {
            background-color: #0a58ca;
        }

        .btn-register {
            background-color: #6c757d;
        }

        .btn-register:hover {
            background-color: #5a6268;
        }

        .icon {
            font-size: 20px;
            vertical-align: middle;
            margin-right: 10px;
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center">

    <div class="central-box text-center">
        <h1 class="mb-3"><i class="bi bi-mortarboard-fill me-2"></i>SIGAC</h1>
        <p class="mb-4">Sistema de Gestão de Atividades Complementares</p>

        <a href="{{ route('login') }}" class="btn btn-admin btn-custom mb-3">
            <i class="bi bi-person-badge icon"></i> Login Administrador
        </a>

        <a href="{{ route('aluno.login') }}" class="btn btn-aluno btn-custom mb-3">
            <i class="bi bi-person-fill icon"></i> Login Aluno
        </a>

        <a href="{{ route('register') }}" class="btn btn-register btn-custom">
            <i class="bi bi-person-plus icon"></i> Registrar Novo Usuário
        </a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
