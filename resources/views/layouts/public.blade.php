<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }} - {{  config('app.name', 'Time Tracker') }}</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.2.1/css/bootstrap.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            min-height: 100vh;
            background: url("/bg.jpg") top left no-repeat;
            background-size: cover;
        }

        .main {
            max-width: 400px;
            width: 100%;
            background-color: #FFF;
        }

        .auth-title {
            margin-bottom: 2rem;
        }
    </style>
</head>
<body>
<div class="container">
    <main class="main rounded shadow p-4">
        <h2 class="auth-title">{{ $title }}</h2>
        @yield('content')
    </main>
</div>
</body>
</html>
