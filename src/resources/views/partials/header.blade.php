@php
    $profile = \App\Models\BusinessProfile::active();
    $cartCount = collect(session('cart', []))->sum('quantity');
@endphp

<header id="site-header" class="site-header">
    <div class="wrap header-row">
        <a href="/" class="logo">
            <span class="logo-badge display">
                @if($profile && $profile->logo)
                    <img src="{{ asset('storage/' . $profile->logo) }}" alt="{{ $profile->name }}">
                @else
                    {{ $profile ? strtoupper(substr($profile->name, 0, 2)) : 'TH' }}
                @endif
            </span>
            <span>
                <span class="brand-name display">{{ $profile->name ?? 'Teras Hilda' }}</span><br>
                <span class="brand-tag">{{ $profile->tagline ?? 'Rasanya Beda' }}</span>
            </span>
        </a>

        <nav class="header-nav desktop-only">
            <a href="/#menu" class="nav-link">Menu</a>
            <a href="/#tentang" class="nav-link">Tentang</a>
            <a href="/#testimoni" class="nav-link">Testimoni</a>
            <a href="/#kontak" class="nav-link">Kontak</a>
        </nav>

        <div class="header-actions">
            <a href="{{ route('order.tracking') }}" class="icon-btn desktop-only" title="Lacak Pesanan" aria-label="Lacak Pesanan">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="7"></circle><path d="m21 21-4.3-4.3"></path></svg>
            </a>
            <button type="button" class="cart-btn" onclick="Livewire.dispatch('openCart')">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="20" r="1.6"></circle><circle cx="18" cy="20" r="1.6"></circle><path d="M2.5 3h2l2.4 12.2a1.8 1.8 0 0 0 1.8 1.4h8.9a1.8 1.8 0 0 0 1.8-1.4L21.5 7H6"></path></svg>
                <span class="desktop-only">Keranjang</span>
                <span id="cart-count" class="cart-badge {{ $cartCount > 0 ? '' : 'hide' }}">{{ $cartCount }}</span>
            </button>
            <button type="button" id="menu-toggle" class="icon-btn mobile-only" aria-label="Buka menu" aria-expanded="false">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"><path d="M4 7h16M4 12h16M4 17h16"></path></svg>
            </button>
        </div>
    </div>

    <div id="mobile-menu" class="mobile-menu mobile-only">
        <div class="wrap">
            <a href="/#menu">Menu <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="m9 6 6 6-6 6"></path></svg></a>
            <a href="/#tentang">Tentang <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="m9 6 6 6-6 6"></path></svg></a>
            <a href="/#testimoni">Testimoni <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="m9 6 6 6-6 6"></path></svg></a>
            <a href="/#kontak">Kontak <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="m9 6 6 6-6 6"></path></svg></a>
            <a href="{{ route('order.tracking') }}">Lacak Pesanan <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="m9 6 6 6-6 6"></path></svg></a>
        </div>
    </div>
</header>
