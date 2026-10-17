@php
    $profile = \App\Models\BusinessProfile::active();
@endphp

<section class="relative overflow-hidden bg-stone-900">
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-gradient-to-br from-stone-900 via-stone-900 to-orange-950"></div>
        <div class="absolute top-0 right-0 w-1/2 h-full opacity-20">
            <div class="absolute top-20 right-20 w-96 h-96 rounded-full bg-orange-500 blur-[120px]"></div>
            <div class="absolute bottom-20 right-40 w-64 h-64 rounded-full bg-red-500 blur-[100px]"></div>
        </div>
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.03\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>
    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-20 sm:py-28 lg:py-36">
        <div class="max-w-3xl">
            <div class="inline-flex items-center gap-2.5 rounded-full border border-orange-500/30 bg-orange-500/10 px-4 py-2 text-xs font-semibold text-orange-400 mb-8">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-orange-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-orange-500"></span>
                </span>
                Sekarang Bisa Pesan Online
            </div>
            <h1 class="text-4xl sm:text-5xl lg:text-7xl font-extrabold leading-[1.1] tracking-tight text-white">
                Rasanya <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-red-400">Beda</span>,<br>
                Harganya <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-red-400">Bersahabat</span>
            </h1>
            <p class="mt-6 text-lg sm:text-xl text-stone-400 leading-relaxed max-w-2xl">
                {{ $profile->description ?? 'Dari Mie Jebew Mentai yang viral hingga kwetiaw, burger, dan pangsit goreng renyah — semua dibuat fresh setiap hari dengan bahan berkualitas.' }}
            </p>
            <div class="mt-10 flex flex-wrap gap-4">
                <a href="#menu" class="inline-flex items-center gap-2.5 rounded-2xl bg-gradient-to-r from-orange-500 to-red-500 px-7 py-4 text-sm font-bold text-white hover:from-orange-600 hover:to-red-600 transition-all shadow-lg shadow-orange-500/25 hover:shadow-xl hover:shadow-orange-500/30 hover:-translate-y-0.5">
                    Lihat Menu
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </a>
                <a href="{{ route('order.tracking') }}" class="inline-flex items-center gap-2.5 rounded-2xl border border-stone-700 bg-stone-800/50 px-7 py-4 text-sm font-bold text-stone-300 hover:bg-stone-800 hover:text-white transition-all">
                    Lacak Pesanan
                </a>
            </div>
            <div class="mt-14 flex flex-wrap items-center gap-8">
                <div class="flex items-center gap-3">
                    <div class="flex -space-x-2.5">
                        <div class="h-10 w-10 rounded-full bg-gradient-to-br from-orange-400 to-red-400 ring-2 ring-stone-900 flex items-center justify-center text-xs font-bold text-white">R</div>
                        <div class="h-10 w-10 rounded-full bg-gradient-to-br from-amber-400 to-orange-400 ring-2 ring-stone-900 flex items-center justify-center text-xs font-bold text-white">D</div>
                        <div class="h-10 w-10 rounded-full bg-gradient-to-br from-red-400 to-pink-400 ring-2 ring-stone-900 flex items-center justify-center text-xs font-bold text-white">S</div>
                        <div class="h-10 w-10 rounded-full bg-stone-700 ring-2 ring-stone-900 flex items-center justify-center text-xs font-bold text-stone-300">+</div>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-white">500+</p>
                        <p class="text-xs text-stone-500">Pelanggan Puas</p>
                    </div>
                </div>
                <div class="h-8 w-px bg-stone-800"></div>
                <div>
                    <div class="flex items-center gap-1 mb-0.5">
                        <span class="text-yellow-400 text-sm tracking-tight">★★★★★</span>
                    </div>
                    <p class="text-xs text-stone-500"><span class="font-bold text-white">4.8</span> dari 5 rating</p>
                </div>
            </div>
        </div>
    </div>
    <div class="absolute bottom-0 left-0 right-0 h-24 bg-gradient-to-t from-stone-50 to-transparent"></div>
</section>
