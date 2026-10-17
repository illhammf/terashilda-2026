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
    @livewireStyles
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .hero-gradient {
            background: linear-gradient(135deg, #ffedd5 0%, #fed7aa 25%, #ffedd5 50%, #fed7aa 75%, #ffedd5 100%);
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        .float-delay-1 { animation-delay: 0.2s; }
        .float-delay-2 { animation-delay: 0.4s; }
        .float-delay-3 { animation-delay: 0.6s; }
        .float-delay-4 { animation-delay: 0.8s; }
        @keyframes floatUp { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-12px); } }
        @keyframes pulseGlow { 0%, 100% { box-shadow: 0 0 0 0 rgba(245, 158, 11, 0.4); } 50% { box-shadow: 0 0 0 10px rgba(245, 158, 11, 0); } }
        @keyframes slideUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
        .animate-slide-up { animation: slideUp 0.6s ease-out forwards; }
        .menu-card-hover {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        .menu-card-hover:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.15);
        }
        .pill-active {
            background: linear-gradient(135deg, #ea580c 0%, #c2410c 100%);
            color: white;
            box-shadow: 0 4px 12px rgba(234, 88, 12, 0.3);
        }
        .btn-orange {
            background: linear-gradient(135deg, #ea580c 0%, #c2410c 100%);
            box-shadow: 0 4px 15px rgba(234, 88, 12, 0.3);
        }
        .btn-orange:hover {
            background: linear-gradient(135deg, #c2410c 0%, #9a3412 100%);
            box-shadow: 0 8px 20px rgba(234, 88, 12, 0.4);
            transform: translateY(-2px);
        }
    </style>
    @stack('styles')
</head>
<body class="bg-[#fff7ed] text-stone-900 antialiased">

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
                toast.className = 'fixed bottom-6 right-6 z-[60] flex items-center gap-3 rounded-2xl bg-stone-900 px-5 py-3.5 text-sm font-medium text-white shadow-2xl animate-slide-up';
                toast.innerHTML = '<span class="flex h-6 w-6 items-center justify-center rounded-full bg-green-500 text-white animate-pulseGlow"><svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg></span><span>' + data.message + '</span>';
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
                        countEl.style.animation = 'pulseGlow 1s infinite';
                    } else {
                        countEl.classList.add('hidden');
                        countEl.classList.remove('flex');
                    }
                }
            });

            document.querySelectorAll('.reveal-on-scroll').forEach(el => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(40px)';
            });

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                        entry.target.style.transition = 'all 0.8s ease-out';
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.1 });

            document.querySelectorAll('.reveal-on-scroll').forEach(el => observer.observe(el));
        });
    </script>
</body>
</html>
