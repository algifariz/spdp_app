<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{ $styles }}

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex items-center h-full py-16 font-sans antialiased bg-gray-100 dark:bg-slate-900">
    <main class="w-full max-w-md p-6 mx-auto">
        {{-- TODO: Hapus comment pada logo jika diperlukan --}}
        {{-- <div class="flex flex-col items-center sm:justify-center">
            <a href="/">
                <x-application-logo class="w-20 h-20 text-gray-500 fill-current" />
            </a>
        </div> --}}

        <div class="w-full max-w-md p-6 mx-auto">
            <div
                class="bg-white border border-gray-200 shadow-sm mt-7 rounded-xl dark:bg-gray-800 dark:border-gray-700">
                <div class="p-4 sm:p-7">
                    {{ $slot }}
                </div>
            </div>
        </div>
        </div>
    </main>

    {{ $scripts }}
</body>

</html>
