<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lacak Pesanan - Teras Hilda</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-orange-50/30 text-gray-900 antialiased min-h-screen">

    @include('partials.header')

    <main class="py-8 sm:py-12">
        <div class="mx-auto max-w-2xl px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-extrabold text-gray-900">Lacak Pesanan</h1>
                <p class="mt-2 text-gray-500">Masukkan nomor pesanan untuk melihat status</p>
            </div>

            <livewire:order-tracking-component />
        </div>
    </main>

    @include('partials.footer')

    @livewireScripts
</body>
</html>
