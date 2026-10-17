@php
    $profile = \App\Models\BusinessProfile::active();
@endphp

<section class="relative overflow-hidden hero-gradient min-h-[70vh] flex items-center">
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-[-10%] left-[-10%] w-[50%] h-[50%] rounded-full bg-orange-400/20 blur-[120px] floatUp float-delay-1"></div>
        <div class="absolute top-[-10%] right-[-10%] w-[40%] h-[40%] rounded-full bg-red-400/20 blur-[100px] floatUp float-delay-2"></div>
        <div class="absolute bottom-[-10%] left-[-10%] w-[45%] h-[45%] rounded-full bg-amber-400/15 blur-[110px] floatUp float-delay-3"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[35%] h-[35%] rounded-full bg-orange-500/20 blur-[90px] floatUp float-delay-4"></div>
        <div class="absolute inset-0 opacity-30" style="background-image: url('data:image/svg+xml,%3Csvg width=\"60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg fill=\"%23c2410c\" fill-opacity=\"0.05\"%3E%3Cpath d=\"M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>
    <div class="relative z-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-20 sm:py-28 lg:py-36">
        <div class="max-w-3xl reveal-on-scroll">
            <div class="inline-flex items-center gap-2.5 rounded-full border border-orange-400/40 bg-orange-500/15 px-5 py-2.5 text-xs font-bold text-orange-700 mb-8 animate-slide-up">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-orange-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-orange-500"></span>
                </span>
                Sekarang Bisa Pesan Online
            </div>
            <h1 class="text-4xl sm:text-5xl lg:text-7xl font-extrabold leading-[1.05] tracking-tight text-stone-900 mb-6 animate-slide-up">
                Rasanya <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-600 to-red-600">Beda</span>,<br>
                Harganya <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-600 to-red-600">Bersahabat</span>
            </h1>
            <p class="mt-4 text-lg sm:text-xl text-stone-600 leading-relaxed max-w-2xl mb-10 animate-slide-up">
                {{ $profile->description ?? 'Dari Mie Jebew Mentai yang viral hingga kwetiaw, burger, dan pangsit goreng renyah — semua dibuat fresh setiap hari dengan bahan berkualitas. Harganya ramah di kantong mahasiswa!' }}
            </p>
            <div class="mt-8 flex flex-wrap gap-4 animate-slide-up">
                <a href="#menu" class="inline-flex items-center gap-3 rounded-2xl btn-orange px-7 py-4 text-sm font-bold text-white shadow-lg shadow-orange-300 hover:shadow-orange-400 transition-all active:scale-95">
                    Lihat Menu
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </a>
                <a href="{{ route('order.tracking') }}" class="inline-flex items-center gap-3 rounded-2xl bg-white/80 backdrop-blur px-7 py-4 text-sm font-bold text-stone-900 border border-orange-200 hover:bg-orange-50 hover:text-orange-700 transition-all shadow-lg">
                    Lacak Pesanan
                </a>
            </div>
            <div class="mt-14 flex flex-wrap items-center gap-8 reveal-on-scroll">
                <div class="flex items-center gap-3">
                    <div class="flex -space-x-2.5">
                        <div class="h-11 w-11 rounded-full bg-gradient-to-br from-orange-400 to-red-400 ring-3 ring-stone-900 flex items-center justify-center text-xs font-bold text-white shadow-lg">R</div>
                        <div class="h-11 w-11 rounded-full bg-gradient-to-br from-amber-400 to-orange-400 ring-3 ring-stone-900 flex items-center justify-center text-xs font-bold text-white shadow-lg">D</div>
                        <div class="h-11 w-11 rounded-full bg-gradient-to-br from-red-400 to-pink-400 ring-3 ring-stone-900 flex items-center justify-center text-xs font-bold text-white shadow-lg">S</div>
                        <div class="h-11 w-11 rounded-full bg-stone-800 ring-3 ring-stone-900 flex items-center justify-center text-xs font-bold text-stone-300 shadow-lg">+</div>
                    </div>
                    <div>
                        <p class="text-2xl font-extrabold text-stone-900">500+</p>
                        <p class="text-xs font-bold uppercase tracking-widest text-orange-600">Pelanggan Puas</p>
                    </div>
                </div>
                <div class="h-10 w-px bg-stone-300"></div>
                <div class="flex items-center gap-1">
                    <span class="text-yellow-400 text-xs tracking-tight">★★★★★</span>
                    <p class="text-xs font-bold uppercase tracking-widest text-orange-600">Rating 4.8</p>
                </div>
            </div>
        </div>
    </div>
</section>
