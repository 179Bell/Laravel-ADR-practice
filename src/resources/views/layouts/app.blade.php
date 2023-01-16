<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title') | {{ config('app.name') }}</title>

        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
        <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        rel="stylesheet"
        />
        <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
        rel="stylesheet"
        />
        <link
        href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css"
        rel="stylesheet"
        />
        <script
        type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"
        ></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    @include('layouts.header')
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <h1 class="d-flex justify-content-center mt-4">{{ config('app.name') }}</h1>
            <!-- Page Content -->
            <main>
                <div class="container mt-2">
                    @yield('content')
                </div>
            </main>
        </div>
    </body>
</html>
