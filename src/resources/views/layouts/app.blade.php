<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Teras Hilda') - Rasanya Beda, Harganya Bersahabat</title>
    <meta name="description" content="@yield('description', 'Teras Hilda - Mie Jebew Mentai, Kwetiaw, Burger, Pangsit dan berbagai makanan lezat lainnya.')">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles>
    @stack('styles')
</head>
<body class="bg-stone-50 text-stone-900 antialiased">

    @include('partials.header')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    @stack('scripts')
    @livewireScripts
    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('notify', (data) => {
                const toast = document.createElement('div');
                toast.className = 'fixed bottom-6 right-6 z-[60] flex items-center gap-3 rounded-2xl bg-stone-900 px-5 py-3.5 text-sm font-medium text-white shadow-2xl';
                toast.innerHTML = '<span class="flex h-6 w-6 items-center justify-center rounded-full bg-green-500 text-white"><svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg></span><span>' + data.message + '</span>';
                document.body.appendChild(toast);
                setTimeout(() => {
                    toast.style.opacity = '0';
                    toast.style.transform = 'translateY(10px)';
                    toast.style.transition = 'all 0.3s ease';
                    setTimeout(() => toast.remove(), 300);
                }, 2500);
            });

            Livewire.on('cartUpdated', (data) => {
                const countEl = document.getElementById('cart-count');
                if (countEl) {
                    const count = data.count || 0;
                    countEl.textContent = count;
                    if (count > 0) {
                        countEl.classList.remove('hidden');
                        countEl.classList.add('flex');
                    } else {
                        countEl.classList.add('hidden');
                        countEl.classList.remove('flex');
                    }
                }
            });
        });
    </script>
</body>
</html>
