@php
    use App\Models\BusinessProfile;
    use App\Models\MenuItem;
    use App\Models\Testimonial;

    $profile = BusinessProfile::active();
    $featuredNames = MenuItem::featured()->take(4)->pluck('name')->all();
    $rotateWords = count($featuredNames) >= 2 ? $featuredNames : ['Mie Jebew Mentai', 'Kwetiaw Sapi', 'Burger Spesial', 'Pangsit Goreng'];
    $menuCount = MenuItem::available()->count();
    $avgRating = round((float) (Testimonial::approved()->avg('rating') ?? 4.8), 1);
@endphp

<section class="hero">
    <div id="hero-glow"></div>
    <div class="wrap hero-grid">
        <div>
            <span class="sticker rot-1" data-reveal="left">
                <span class="ping-dot"></span>
                Buka Hari Ini &middot; Pesan Online
            </span>
            <h1 class="hero-title display" data-reveal="left" data-delay="80">
                Makan Enak,<br>
                Kantong Tetap <span class="mark">Aman</span>
            </h1>
            <p class="hero-sub" data-reveal="left" data-delay="160">
                {{ $profile->description ?? 'Dari Mie Jebew Mentai yang viral hingga kwetiaw, burger, dan pangsit goreng renyah. Dibuat fresh setiap hari dengan bahan pilihan, harga ramah kantong mahasiswa.' }}
            </p>
            <div class="rotator" data-reveal="left" data-delay="220">
                <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 0c.8 6.5 4.7 10.4 12 12-7.3 1.6-11.2 5.5-12 12-.8-6.5-4.7-10.4-12-12C7.3 10.4 11.2 6.5 12 0z"/></svg>
                <span>Hari ini mau makan</span>
                <span class="rotator-word" data-rotate-words="{{ json_encode($rotateWords) }}">{{ $rotateWords[0] }}</span>
            </div>
            <div class="hero-cta" data-reveal="left" data-delay="280">
                <a href="/#menu" class="btn btn-cabai btn-lg" data-magnet data-burst>
                    Lihat Menu
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M19 9l-7 7-7-7"></path></svg>
                </a>
                <a href="{{ route('order.tracking') }}" class="btn btn-paper btn-lg">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="7"></circle><path d="m21 21-4.3-4.3"></path></svg>
                    Lacak Pesanan
                </a>
            </div>
            <div class="stat-row" data-reveal="left" data-delay="340">
                <div class="stat">
                    <span class="stat-num display" data-counter="{{ max($menuCount, 1) }}" data-suffix="+">{{ max($menuCount, 1) }}+</span>
                    <span class="stat-label">Pilihan Menu</span>
                </div>
                <div class="stat-sep"></div>
                <div class="stat">
                    <span class="stat-num display" data-counter="500" data-suffix="+">500+</span>
                    <span class="stat-label">Pelanggan Puas</span>
                </div>
                <div class="stat-sep"></div>
                <div class="stat">
                    <span class="stat-num display" data-counter="{{ $avgRating }}" data-decimals="1">{{ number_format($avgRating, 1, ',', '.') }}</span>
                    <span class="stat-label">Rating Pelanggan</span>
                </div>
            </div>
        </div>

        <div class="illust-wrap" data-reveal="right" data-delay="160">
            <span class="doodle doodle-1" style="--rot:-6deg" data-parallax="0.05">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" style="color:var(--pandan)"><path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"></path><path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"></path></svg>
                100% Fresh
            </span>
            <span class="doodle doodle-2" style="--rot:4deg" data-parallax="0.09">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.59 13.41 13.42 20.58a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.83Z"></path><circle cx="7" cy="7" r="1.5"></circle></svg>
                Mulai Rp 5.000
            </span>
            <span class="doodle doodle-3" style="--rot:-3deg" data-parallax="0.07">
                <svg viewBox="0 0 24 24" fill="currentColor" style="color:var(--kunyit)"><path d="M12 0c.8 6.5 4.7 10.4 12 12-7.3 1.6-11.2 5.5-12 12-.8-6.5-4.7-10.4-12-12C7.3 10.4 11.2 6.5 12 0z"/></svg>
                Rasanya Juara
            </span>

            <div class="illust-card">
                @if($profile && $profile->hero_image)
                    <img src="{{ asset('storage/' . $profile->hero_image) }}" alt="{{ $profile->name }}" class="illust-img">
                @else
                    <div class="illust-stage">
                        <svg viewBox="0 0 420 340" role="img" aria-label="Ilustrasi mangkuk mie">
                            <path d="M330 56c1.4 11 6.2 15.8 17 17-10.8 1.2-15.6 6-17 17-1.4-11-6.2-15.8-17-17 10.8-1.2 15.6-6 17-17z" fill="#F5B301"/>
                            <path d="M64 62c1 8 4.6 11.6 12.5 12.5C68.6 75.4 65 79 64 87c-1-8-4.6-11.6-12.5-12.5C59.4 73.6 63 70 64 62z" fill="#E4572E" opacity="0.75"/>
                            <circle cx="352" cy="264" r="7" fill="#2E8B57" opacity="0.65"/>
                            <circle cx="76" cy="252" r="6" fill="#F5B301" opacity="0.8"/>
                            <g class="steam" stroke="#231A12" stroke-width="5" stroke-linecap="round" fill="none" opacity="0.45">
                                <path d="M150 92c-14-16 12-26 0-44"/>
                                <path d="M210 84c-14-16 12-26 0-44"/>
                                <path d="M270 92c-14-16 12-26 0-44"/>
                            </g>
                            <path d="M46 192C46 282 120 322 210 322s164-40 164-130Z" fill="#E4572E" stroke="#231A12" stroke-width="7"/>
                            <g stroke="#231A12" stroke-width="9" stroke-linecap="round">
                                <line x1="258" y1="48" x2="168" y2="168"/>
                                <line x1="286" y1="56" x2="200" y2="176"/>
                            </g>
                            <g stroke="#F5B301" stroke-width="9" stroke-linecap="round" fill="none">
                                <path d="M118 158c34-28 82-42 116-28"/>
                                <path d="M112 180c46-32 108-46 156-26"/>
                                <path d="M126 202c52-28 118-34 162-12"/>
                            </g>
                            <ellipse cx="210" cy="192" rx="164" ry="46" fill="#FFFBF3" stroke="#231A12" stroke-width="7"/>
                            <circle cx="152" cy="184" r="24" fill="#fff" stroke="#231A12" stroke-width="6"/>
                            <circle cx="152" cy="184" r="10" fill="#F5B301" stroke="#231A12" stroke-width="4"/>
                            <path d="M258 166c18 8 32 20 36 34-20 3-40-4-50-16Z" fill="#2E8B57" stroke="#231A12" stroke-width="5" stroke-linejoin="round"/>
                            <path d="M164 262c28 20 64 20 92 0" stroke="#FFF6E9" stroke-width="10" stroke-linecap="round" fill="none"/>
                            <path d="M96 238c9 7 18 7 27 0" stroke="#FFE9B8" stroke-width="8" stroke-linecap="round" fill="none" opacity="0.85"/>
                        </svg>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

@include('sections.ticker', ['dark' => false])
