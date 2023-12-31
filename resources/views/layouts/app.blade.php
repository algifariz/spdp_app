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

<body class="font-sans antialiased bg-gray-50 dark:bg-slate-900">
    @include('layouts.header')

    <!-- ========== MAIN CONTENT ========== -->
    @include('layouts.sidebar')

    <!-- Content -->
    <div class="w-full px-4 pt-10 pb-14 sm:px-6 md:px-8 lg:pl-72">
        {{ $slot }}
    </div>
    <!-- End Content -->
    <!-- ========== END MAIN CONTENT ========== -->

    {{ $scripts }}
</body>

</html>
