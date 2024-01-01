<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title') - {{ config('app.name') }}</title>
        {{-- tailwind css --}}
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    </head>
    <body>
        <header>
            @include('admin.supports.partials.header-logged')
        </header>
        <main class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8 py-8">
            @yield('content')
        </main>
        @include('admin.layouts.scripts')
    </body>
</html>
