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
    </head>
    <body>
        <header>
            @include('admin.supports.partials.header-logged')
        </header>
        <main class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8 py-8">
            @yield('content')
        </main>
        <script>
            const modalCreate = document.querySelector('#create-form');
            const modalUpdate = document.querySelector('#edit-form');
            const activateBtnModal = document.querySelector('.showModal');
            const activateBtnModalUpdate = document.querySelector('.showEdit');
            activateBtnModal.addEventListener('click', function () {
                modalCreate.classList.remove('hidden');
            });

            activateBtnModalUpdate.addEventListener('click', function () {
                modalUpdate.classList.remove('hidden');
            });
        </script>
    </body>
</html>
