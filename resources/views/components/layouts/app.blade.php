<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title', config('app.name'))
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @wireUiScripts

    <script>
        (function() {
            // 1️⃣ Pega do localStorage
            let theme = localStorage.getItem('theme');

            // 2️⃣ Se não existir, pega do sistema
            if (!theme) {
                theme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
            }

            // 3️⃣ Aplica imediatamente ao HTML
            document.documentElement.setAttribute('data-theme', theme);

            // 4️⃣ Salva no localStorage para persistência
            localStorage.setItem('theme', theme);
        })();
    </script>

    @stack('styles')

</head>

<body class="min-h-screen bg-gray-50 text-gray-900 dark:bg-gray-900 dark:text-gray-100">

    <header class="border-b border-gray-200 dark:border-gray-800">
        <div class="container mx-auto px-4 py-3 flex justify-between">
            <span class="font-semibold">{{ config('app.name') }}</span>
            <livewire:theme-switcher />
        </div>
    </header>

    <main class="container mx-auto px-4 py-6">
        {{ $slot }}
    </main>

    @livewireScripts

    @stack('scripts')
</body>

</html>
