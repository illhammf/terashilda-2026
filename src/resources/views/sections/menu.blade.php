@php
    use App\Models\Category;
    use App\Models\MenuItem;

    $categories = Category::where('is_active', true)->orderBy('sort_order')->get();
    $menuItems = MenuItem::with('category')->available()->orderBy('sort_order')->get();
    $illColors = [
        'mie-jebew' => ['bg' => '#FFE3D6', 'fg' => '#E4572E'],
        'kwetiaw' => ['bg' => '#FFEFC2', 'fg' => '#B07C00'],
        'burger' => ['bg' => '#E2F0E7', 'fg' => '#2E8B57'],
        'pangsit' => ['bg' => '#FFE9B8', 'fg' => '#C7461F'],
        'minuman' => ['bg' => '#E3EFFB', 'fg' => '#2B6CB0'],
        'snack' => ['bg' => '#F0E7FB', 'fg' => '#6B46C1'],
    ];
@endphp

<section id="menu" class="section">
    <div class="wrap">
        <div class="section-head center" data-reveal>
            <span class="sticker rot-2">Menu Kami</span>
            <h2 class="section-title display">Pilih Favoritmu</h2>
            <p class="section-sub head-center">Semua dimasak fresh saat dipesan. Klik tambah, bayar, lalu ambil atau minta diantar.</p>
        </div>

        <div class="steps-row" data-reveal data-delay="80">
            <div class="step-card">
                <span class="step-num display">01</span>
                <h3 class="display">Pilih Menu</h3>
                <p>Tambahkan makanan dan minuman favoritmu ke keranjang.</p>
            </div>
            <div class="step-card">
                <span class="step-num display">02</span>
                <h3 class="display">Isi Data &amp; Bayar</h3>
                <p>Lengkapi data pesanan, pilih tunai, transfer, QRIS, atau e-wallet.</p>
            </div>
            <div class="step-card">
                <span class="step-num display">03</span>
                <h3 class="display">Ambil atau Diantar</h3>
                <p>Lacak status pesananmu sampai siap diambil atau diantar.</p>
            </div>
        </div>

        <div class="filter-row" data-reveal>
            <button type="button" class="filter-pill active" data-filter="all">Semua</button>
            @foreach($categories as $category)
                <button type="button" class="filter-pill" data-filter="{{ $category->slug }}">{{ $category->name }}</button>
            @endforeach
        </div>

        <div class="menu-grid">
            @foreach($menuItems as $item)
                @php
                    $ill = $illColors[$item->category->slug] ?? ['bg' => '#FFE9B8', 'fg' => '#E4572E'];
                @endphp
                <article class="menu-card" data-menu-card data-category="{{ $item->category->slug }}" data-tilt="4" data-reveal="scale" data-delay="{{ ($loop->index % 4) * 70 }}">
                    <div class="menu-fig" style="--ill-bg: {{ $ill['bg'] }}">
                        @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" loading="lazy">
                        @else
                            <div class="menu-ill" style="--ill-fg: {{ $ill['fg'] }}">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    @if($item->category->slug === 'mie-jebew')
                                        <path d="M4 11h16a1 1 0 0 1 1 1 8 8 0 0 1-8 8h-2a8 8 0 0 1-8-8 1 1 0 0 1 1-1Z"></path>
                                        <path d="M9 7c0-1.5 1-2 1-3.5"></path>
                                        <path d="M14 7c0-1.5 1-2 1-3.5"></path>
                                    @elseif($item->category->slug === 'kwetiaw')
                                        <path d="M4 9c0-2 2-3.5 4-3.5S12 7 12 9s2 3.5 4 3.5S20 11 20 9"></path>
                                        <path d="M4 15c0-2 2-3.5 4-3.5s4 1.5 4 3.5 2 3.5 4 3.5 4-1.5 4-3.5"></path>
                                    @elseif($item->category->slug === 'burger')
                                        <path d="M4 10.5a8 8 0 0 1 16 0Z"></path>
                                        <path d="M4 14h16"></path>
                                        <path d="M5 17.5h14a2 2 0 0 0 2-2v-.5H3v.5a2 2 0 0 0 2 2Z"></path>
                                    @elseif($item->category->slug === 'pangsit')
                                        <path d="M7 9c0-2.5 2-4.5 5-4.5S17 6.5 17 9c1.5 1 2.5 2.4 2.5 4.1 0 3.1-3.4 5.4-7.5 5.4S4.5 16.2 4.5 13.1C4.5 11.4 5.5 10 7 9Z"></path>
                                        <path d="M9 19l-1.5 2M15 19l1.5 2M12 19v2.5"></path>
                                    @elseif($item->category->slug === 'minuman')
                                        <path d="M6 8h12l-1.3 11.2a2 2 0 0 1-2 1.8H9.3a2 2 0 0 1-2-1.8L6 8Z"></path>
                                        <path d="M9 8V5.5A1.5 1.5 0 0 1 10.5 4h1.5"></path>
                                        <path d="m15 8 2-4.5"></path>
                                    @else
                                        <circle cx="12" cy="12" r="8"></circle>
                                        <circle cx="9.5" cy="10.5" r="1"></circle>
                                        <circle cx="14" cy="9.5" r="1"></circle>
                                        <circle cx="12.5" cy="14.5" r="1"></circle>
                                    @endif
                                </svg>
                            </div>
                        @endif
                        @if($item->is_featured)
                            <span class="corner-badge fav">Favorit</span>
                        @endif
                        @if($item->discount_percent)
                            <span class="corner-badge promo">-{{ $item->discount_percent }}%</span>
                        @endif
                    </div>
                    <div class="menu-body">
                        <h3 class="menu-name display">{{ $item->name }}</h3>
                        <p class="menu-desc clamp-2">{{ $item->description }}</p>
                        <div class="price-row">
                            <div>
                                @if($item->discount_price)
                                    <div class="price-old">Rp {{ number_format($item->price, 0, ',', '.') }}</div>
                                    <div class="price">Rp {{ number_format($item->final_price, 0, ',', '.') }}</div>
                                @else
                                    <div class="price">Rp {{ number_format($item->price, 0, ',', '.') }}</div>
                                @endif
                            </div>
                            <button type="button" class="add-btn" data-burst onclick="Livewire.dispatch('addToCart', { id: {{ $item->id }} })">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"><path d="M12 5v14M5 12h14"></path></svg>
                                Tambah
                            </button>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
