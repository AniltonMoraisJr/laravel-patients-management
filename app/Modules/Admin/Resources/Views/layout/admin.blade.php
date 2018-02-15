<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - Patients Management</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div id="app">    
        @include('admin::partials.admin-menu')
        <main class="py-4">
            <div class="container">
                @yield('content')
            </div>
        </main>
    </div>

    <script src="{{ asset('js/app.js')  }}"></script>
</body>
</html>