@php
    $profile = \App\Models\BusinessProfile::active();
    $sparkle = '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 0c.8 6.5 4.7 10.4 12 12-7.3 1.6-11.2 5.5-12 12-.8-6.5-4.7-10.4-12-12C7.3 10.4 11.2 6.5 12 0z"/></svg>';
    $tickerItems = ['Mie Jebew Mentai', 'Kwetiaw', 'Burger', 'Pangsit Goreng', 'Harga Mahasiswa', 'Fresh Tiap Hari', 'Pesan Online'];
@endphp

<div class="marquee marquee-dark" aria-hidden="true">
    <div class="marquee-track">
        @for($copy = 0; $copy < 2; $copy++)
            @foreach($tickerItems as $item)
                <span class="marquee-item">{!! $sparkle !!} {{ $item }}</span>
            @endforeach
        @endfor
    </div>
</div>

<footer class="footer">
    <div class="footer-inner">
        <div class="wrap footer-grid">
            <div>
                <a href="/" class="logo" style="margin-bottom:18px">
                    <span class="logo-badge display">
                        @if($profile && $profile->logo)
                            <img src="{{ asset('storage/' . $profile->logo) }}" alt="{{ $profile->name }}">
                        @else
                            {{ $profile ? strtoupper(substr($profile->name, 0, 2)) : 'TH' }}
                        @endif
                    </span>
                    <span>
                        <span class="brand-name display" style="color:var(--paper)">{{ $profile->name ?? 'Teras Hilda' }}</span><br>
                        <span class="brand-tag">{{ $profile->tagline ?? 'Rasanya Beda' }}</span>
                    </span>
                </a>
                <p style="font-size:0.88rem;line-height:1.75;color:rgba(255,246,233,0.72);max-width:42ch">{{ $profile->description ?? 'Makanan fresh setiap hari dengan harga bersahabat untuk semua.' }}</p>
                <div style="display:flex;gap:12px;margin-top:22px">
                    @if($profile && $profile->instagram)
                        <a href="https://instagram.com/{{ ltrim($profile->instagram, '@') }}" target="_blank" rel="noopener" class="social-btn" aria-label="Instagram">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2.5" y="2.5" width="19" height="19" rx="5.5"></rect><circle cx="12" cy="12" r="4.2"></circle><circle cx="17.4" cy="6.6" r="1.2" fill="currentColor" stroke="none"></circle></svg>
                        </a>
                    @endif
                    @if($profile && $profile->tiktok)
                        <a href="https://tiktok.com/{{ ltrim($profile->tiktok, '@') }}" target="_blank" rel="noopener" class="social-btn" aria-label="TikTok">
                            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12.5.02c1.3-.02 2.6-.01 3.9-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg>
                        </a>
                    @endif
                    @if($profile && $profile->whatsapp)
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $profile->whatsapp) }}" target="_blank" rel="noopener" class="social-btn" aria-label="WhatsApp">
                            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M17.47 14.38c-.3-.15-1.76-.87-2.03-.97-.27-.1-.47-.15-.67.15-.2.3-.77.97-.94 1.16-.17.2-.35.22-.64.08-.3-.15-1.26-.46-2.4-1.48-.88-.79-1.48-1.76-1.65-2.06-.17-.3-.02-.46.13-.6.13-.14.3-.35.45-.52.15-.18.2-.3.3-.5.1-.2.05-.37-.03-.52-.07-.15-.67-1.61-.92-2.2-.24-.58-.49-.5-.67-.51h-.57c-.2 0-.52.07-.8.37-.27.3-1.04 1.02-1.04 2.48s1.07 2.87 1.21 3.07c.15.2 2.1 3.2 5.08 4.49.71.3 1.26.49 1.69.62.71.23 1.36.2 1.87.12.57-.09 1.76-.72 2-1.41.25-.7.25-1.29.18-1.42-.07-.12-.27-.2-.57-.35M12.05 21.8h-.01a9.87 9.87 0 0 1-5.03-1.38l-.36-.21-3.74.98 1-3.65-.24-.37a9.86 9.86 0 0 1-1.51-5.26c0-5.45 4.44-9.88 9.89-9.88 2.64 0 5.12 1.03 6.99 2.9a9.82 9.82 0 0 1 2.89 6.99c0 5.45-4.44 9.88-9.89 9.88m8.41-18.3A11.82 11.82 0 0 0 12.05 0C5.5 0 .16 5.34.16 11.89c0 2.1.55 4.14 1.59 5.95L.06 24l6.3-1.65a11.88 11.88 0 0 0 5.69 1.45h.01c6.55 0 11.89-5.34 11.89-11.89 0-3.18-1.24-6.17-3.49-8.41Z"/></svg>
                        </a>
                    @endif
                </div>
            </div>
            <div>
                <h3 class="footer-title">Jelajahi</h3>
                <a href="/#menu" class="footer-link">Menu Kami</a>
                <a href="/#tentang" class="footer-link">Tentang Kami</a>
                <a href="/#testimoni" class="footer-link">Testimoni</a>
                <a href="/#kontak" class="footer-link">Kontak</a>
                <a href="{{ route('order.tracking') }}" class="footer-link">Lacak Pesanan</a>
            </div>
            <div>
                <h3 class="footer-title">Jam Buka</h3>
                @if($profile && $profile->opening_hours)
                    @foreach($profile->opening_hours as $day => $hours)
                        <div class="footer-hours"><b>{{ $day }}</b><span>{{ $hours }}</span></div>
                    @endforeach
                @else
                    <div class="footer-hours"><b>Senin - Jumat</b><span>09.00 - 21.00</span></div>
                    <div class="footer-hours"><b>Sabtu - Minggu</b><span>10.00 - 22.00</span></div>
                @endif
                <div style="margin-top:18px;font-size:0.85rem;line-height:1.7;color:rgba(255,246,233,0.75)">
                    <div>{{ $profile->address ?? 'Jl. Pendidikan No. 45, Yogyakarta' }}</div>
                    <div>{{ $profile->phone ?? '0274-123456' }}</div>
                </div>
            </div>
        </div>
        <div class="wrap footer-bottom">
            <span>&copy; {{ date('Y') }} {{ $profile->name ?? 'Teras Hilda' }}. Semua hak dilindungi.</span>
            <span>Dibuat dengan Laravel & Filament</span>
        </div>
        <div class="watermark">{{ strtoupper($profile->name ?? 'Teras Hilda') }}</div>
    </div>
</footer>
