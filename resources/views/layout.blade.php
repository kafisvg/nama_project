<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Bantuan Sosial</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Style -->
    <style>
        body {
            background: linear-gradient(to right, #f8f9fa, #e8f0fe);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .card {
            border-radius: 1rem;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .table {
            border-radius: 0.5rem;
            overflow: hidden;
        }

        h1, h2, h3, h4 {
            font-weight: 600;
        }

        .btn {
            border-radius: 1.5rem;
            padding-left: 1.2rem;
            padding-right: 1.2rem;
        }

        footer {
            background-color: #f8f9fa;
            border-top: 1px solid #dee2e6;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4 shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('penerima.index') }}">Data Bantuan Sosial</a>
        </div>
    </nav>

    <div class="container mb-5">
        @yield('content')
    </div>

    

    <!-- Bootstrap Bundle JS (jika dibutuhkan interaksi JS Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

