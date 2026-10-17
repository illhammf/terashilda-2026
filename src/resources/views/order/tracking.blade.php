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
</head>
<body class="bg-stone-50 text-stone-900 antialiased min-h-screen">

    @include('partials.header')

    <main class="py-10 sm:py-16">
        <div class="mx-auto max-w-2xl px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10">
                <div class="inline-flex items-center gap-2 rounded-full bg-orange-100 px-4 py-1.5 text-xs font-bold text-orange-700 mb-4">
                    LACAK PESANAN
                </div>
                <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight text-stone-900">Lacak Pesanan</h1>
                <p class="mt-2 text-stone-500">Masukkan nomor pesanan untuk melihat status</p>
            </div>

            <livewire:order-tracking-component />
        </div>
    </main>

    @include('partials.footer')

    @livewireScripts
</body>
</html>
