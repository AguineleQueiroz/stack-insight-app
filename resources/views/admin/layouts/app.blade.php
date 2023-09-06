<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title') - {{ config('app.name') }}</title>
        {{-- tailwind css --}}
        <script src="https://cdn.tailwindcss.com"></script
    </head>
    <body>
        <header>
            @include('admin.layouts.partials.header-logged')
        </header>
        <main class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8 py-8">
            @yield('content')
        </main>
        <footer class="h-25 px-4 py-2 bg-slate-300 absolute inset-x-0 bottom-0">
            <p class="text-slate-600 text-sm text-center">Copyright 2023 - Aguinele Queiroz</p>
        </footer>
    </body>
</html>
