@php
    $profile = \App\Models\BusinessProfile::active();
@endphp

<header class="sticky top-0 z-40 bg-white border-b border-stone-200 shadow-sm">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <a href="/" class="flex items-center gap-3">
                @if($profile && $profile->logo)
                    <img src="{{ asset('storage/' . $profile->logo) }}" alt="{{ $profile->name }}" class="h-10 w-10 rounded-xl object-cover shadow-md">
                @else
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-orange-500 to-red-600 text-white font-extrabold text-sm shadow-md">
                        {{ $profile ? strtoupper(substr($profile->name, 0, 2)) : 'TH' }}
                    </div>
                @endif
                <div class="flex flex-col">
                    <span class="text-lg font-extrabold tracking-tight text-stone-900">{{ $profile->name ?? 'Teras Hilda' }}</span>
                    <span class="text-[10px] font-semibold uppercase tracking-wider text-orange-600">{{ $profile->tagline ?? 'Rasanya Beda' }}</span>
                </div>
            </a>

            <nav class="hidden md:flex items-center gap-1 text-sm font-medium text-stone-600">
                <a href="#menu" class="rounded-lg px-4 py-2 hover:bg-orange-50 hover:text-orange-700 transition-colors">Menu</a>
                <a href="#tentang" class="rounded-lg px-4 py-2 hover:bg-orange-50 hover:text-orange-700 transition-colors">Tentang</a>
                <a href="#testimoni" class="rounded-lg px-4 py-2 hover:bg-orange-50 hover:text-orange-700 transition-colors">Testimoni</a>
                <a href="#kontak" class="rounded-lg px-4 py-2 hover:bg-orange-50 hover:text-orange-700 transition-colors">Kontak</a>
            </nav>

            <div class="flex items-center gap-2">
                <a href="{{ route('order.tracking') }}" class="hidden sm:inline-flex items-center gap-2 rounded-xl px-4 py-2.5 text-sm font-semibold text-stone-600 hover:bg-stone-100 transition-colors">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                    Lacak
                </a>
                <button onclick="Livewire.dispatch('openCart')" class="relative inline-flex items-center gap-2 rounded-xl bg-stone-900 px-4 py-2.5 text-sm font-semibold text-white hover:bg-stone-800 transition-colors shadow-md">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z"/></svg>
                    <span class="hidden sm:inline">Keranjang</span>
                    <span id="cart-count" class="absolute -top-1.5 -right-1.5 hidden h-5 w-5 items-center justify-center rounded-full bg-orange-500 text-[10px] font-bold text-white ring-2 ring-white">0</span>
                </button>
            </div>
        </div>
    </div>
</header>
