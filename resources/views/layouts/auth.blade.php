<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', env('APP_NAME'))</title>

    @vite([
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/sass/main.sass'
            ])
</head>
<body class="antialiased">

@if(session()->has('message'))
    {{ session('message') }}
@endif

<main class="md:min-h-screen md:flex md:items-center md:justify-center py-16 lg:py-20">
    <div class="container">

        <!-- Page heading -->
        <div class="text-center">
            <a href="{{ route('home') }}" class="inline-block" rel="home">
                <img src="{{ Vite::image('logo.svg') }}" class="w-[148px] md:w-[201px] h-[36px] md:h-[50px]" alt="CutCode">
            </a>
        </div>



        @yield('content')
    </div>
</main>


</body>
</html>
