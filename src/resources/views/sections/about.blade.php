@php
    use App\Models\BusinessProfile;
    use App\Models\MenuItem;
    use App\Models\Testimonial;

    $profile = BusinessProfile::active();
    $menuTotal = MenuItem::available()->count();
    $testiTotal = Testimonial::approved()->count();
@endphp

<section id="tentang" class="section">
    <div class="wrap about-grid">
        <div data-reveal="left">
            <span class="sticker rot-1">Cerita Kami</span>
            <h2 class="section-title display">{{ $profile->name ?? 'Teras Hilda' }}</h2>
            <p class="about-text" style="margin-top:18px">{{ $profile->description ?? 'Teras Hilda lahir dari kecintaan pada masakan rumahan yang jujur: bahan segar, bumbu racikan sendiri, dan harga yang tidak bikin kantong menjerit.' }}</p>
            @if($profile && $profile->story)
                <p class="about-text">{{ $profile->story }}</p>
            @endif
            <ul class="check-list">
                <li>
                    <span class="check-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.4" stroke-linecap="round" stroke-linejoin="round"><path d="M5 13l4 4L19 7"></path></svg></span>
                    Bahan segar dibeli dari pasar setiap pagi
                </li>
                <li>
                    <span class="check-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.4" stroke-linecap="round" stroke-linejoin="round"><path d="M5 13l4 4L19 7"></path></svg></span>
                    Bumbu dan saus racikan sendiri, tanpa pengawet
                </li>
                <li>
                    <span class="check-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.4" stroke-linecap="round" stroke-linejoin="round"><path d="M5 13l4 4L19 7"></path></svg></span>
                    Harga bersahabat, porsi mahasiswa
                </li>
            </ul>
            <div class="info-grid">
                <div class="info-card">
                    <span class="icon-chip" style="background:var(--kunyit-soft)">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"></circle><path d="M12 7v5l3 3"></path></svg>
                    </span>
                    <h4>Jam Buka</h4>
                    @if($profile && $profile->opening_hours)
                        @foreach($profile->opening_hours as $day => $hours)
                            <p>{{ $day }}: {{ $hours }}</p>
                        @endforeach
                    @else
                        <p>Senin - Jumat: 09.00 - 21.00<br>Sabtu - Minggu: 10.00 - 22.00</p>
                    @endif
                </div>
                <div class="info-card">
                    <span class="icon-chip" style="background:var(--pandan-soft)">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12S4 16 4 10a8 8 0 1 1 16 0Z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                    </span>
                    <h4>Lokasi</h4>
                    <p>{{ $profile->address ?? 'Jl. Pendidikan No. 45, Yogyakarta' }}</p>
                </div>
                <div class="info-card">
                    <span class="icon-chip" style="background:#FFDFD6">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.13.96.36 1.9.7 2.8a2 2 0 0 1-.45 2.1L8.1 9.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.45c.9.34 1.84.57 2.8.7A2 2 0 0 1 22 16.9Z"></path></svg>
                    </span>
                    <h4>Telepon</h4>
                    <p>{{ $profile->phone ?? '0274-123456' }}</p>
                </div>
                <div class="info-card">
                    <span class="icon-chip" style="background:#E3EFFB">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="14" rx="3"></rect><path d="m4 7 8 6 8-6"></path></svg>
                    </span>
                    <h4>Email</h4>
                    <p>{{ $profile->email ?? 'halo@terashilda.id' }}</p>
                </div>
            </div>
        </div>

        <div class="collage" data-reveal="right">
            <div class="polaroid">
                <span class="tape"></span>
                @if($profile && $profile->hero_image)
                    <img src="{{ asset('storage/' . $profile->hero_image) }}" alt="{{ $profile->name }}" style="border:2px solid var(--ink);border-radius:16px;aspect-ratio:4/3;object-fit:cover;width:100%">
                @else
                    <div class="polaroid-stage">
                        <svg viewBox="0 0 420 300" role="img" aria-label="Ilustrasi dapur Teras Hilda">
                            <path d="M60 46c1 8 4.6 11.6 12.5 12.5C64.6 59.4 61 63 60 71c-1-8-4.6-11.6-12.5-12.5C55.4 57.6 59 54 60 46z" fill="#F5B301"/>
                            <path d="M352 58c1.4 11 6.2 15.8 17 17-10.8 1.2-15.6 6-17 17-1.4-11-6.2-15.8-17-17 10.8-1.2 15.6-6 17-17z" fill="#E4572E" opacity="0.8"/>
                            <rect x="58" y="150" width="304" height="112" rx="18" fill="#FFF6E9" stroke="#231A12" stroke-width="6"/>
                            <rect x="58" y="128" width="304" height="34" rx="12" fill="#F5B301" stroke="#231A12" stroke-width="6"/>
                            <path d="M112 128c0-30 22-52 52-52" stroke="#231A12" stroke-width="8" fill="none" stroke-linecap="round"/>
                            <path d="M112 128c0-30 22-52 52-52" stroke="#E4572E" stroke-width="4" fill="none" stroke-linecap="round"/>
                            <rect x="96" y="196" width="76" height="42" rx="10" fill="#E2F0E7" stroke="#231A12" stroke-width="5"/>
                            <rect x="196" y="196" width="76" height="42" rx="10" fill="#FFE3D6" stroke="#231A12" stroke-width="5"/>
                            <rect x="296" y="196" width="40" height="42" rx="10" fill="#E3EFFB" stroke="#231A12" stroke-width="5"/>
                            <path d="M132 262c40 12 116 12 156 0" stroke="#231A12" stroke-width="5" fill="none" stroke-linecap="round" stroke-dasharray="2 12"/>
                            <circle cx="340" cy="110" r="8" fill="#2E8B57"/>
                            <circle cx="96" cy="104" r="6" fill="#E4572E"/>
                        </svg>
                    </div>
                @endif
                <p class="polaroid-caption">Dibuat fresh setiap hari, sejak pagi buta</p>
            </div>

            <div class="doodle" style="--rot:3deg;position:absolute;top:-18px;right:-14px;background:var(--kunyit-soft)" data-parallax="0.05">
                <svg viewBox="0 0 24 24" fill="currentColor" style="color:var(--kunyit)"><path d="M12 0c.8 6.5 4.7 10.4 12 12-7.3 1.6-11.2 5.5-12 12-.8-6.5-4.7-10.4-12-12C7.3 10.4 11.2 6.5 12 0z"/></svg>
                0 Pengawet
            </div>
            <div class="doodle" style="--rot:-2deg;position:absolute;bottom:-16px;left:-12px;background:#fff" data-parallax="0.08">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" style="color:var(--pandan)"><path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"></path></svg>
                Bahan Pilihan
            </div>

            <div class="stat-row" style="justify-content:center;gap:22px" data-reveal data-delay="120">
                <div class="stat center">
                    <span class="stat-num display" data-counter="{{ max($menuTotal, 1) }}" data-suffix="+">{{ max($menuTotal, 1) }}+</span>
                    <span class="stat-label">Menu</span>
                </div>
                <div class="stat-sep"></div>
                <div class="stat center">
                    <span class="stat-num display" data-counter="{{ max($testiTotal, 1) }}" data-suffix="+">{{ max($testiTotal, 1) }}+</span>
                    <span class="stat-label">Ulasan</span>
                </div>
                <div class="stat-sep"></div>
                <div class="stat center">
                    <span class="stat-num display" data-counter="100" data-suffix="%">100%</span>
                    <span class="stat-label">Fresh</span>
                </div>
            </div>
        </div>
    </div>
</section>
