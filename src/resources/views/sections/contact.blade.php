@php
    use App\Models\BusinessProfile;

    $profile = BusinessProfile::active();
@endphp

<section id="kontak" class="section dot-bg">
    <div class="wrap contact-grid">
        <div data-reveal="left">
            <span class="sticker rot-2">Hubungi Kami</span>
            <h2 class="section-title display">Ada Pertanyaan?<br>Ngobrol Saja</h2>
            <p class="section-sub">Mau pesan buat acara, katering, atau sekadar tanya menu hari ini? Kami siap membantu.</p>

            <div class="contact-list">
                <div class="contact-item">
                    <span class="icon-chip" style="background:var(--kunyit-soft)">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12S4 16 4 10a8 8 0 1 1 16 0Z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                    </span>
                    <span>
                        <h4>Alamat</h4>
                        <p>{{ $profile->address ?? 'Jl. Pendidikan No. 45, Yogyakarta' }}</p>
                    </span>
                </div>
                <div class="contact-item">
                    <span class="icon-chip" style="background:#FFDFD6">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.13.96.36 1.9.7 2.8a2 2 0 0 1-.45 2.1L8.1 9.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.45c.9.34 1.84.57 2.8.7A2 2 0 0 1 22 16.9Z"></path></svg>
                    </span>
                    <span>
                        <h4>Telepon</h4>
                        <p>{{ $profile->phone ?? '0274-123456' }}</p>
                    </span>
                </div>
                @if($profile && $profile->whatsapp)
                    <a class="contact-item" href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $profile->whatsapp) }}" target="_blank" rel="noopener">
                        <span class="icon-chip" style="background:var(--pandan-soft)">
                            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M17.47 14.38c-.3-.15-1.76-.87-2.03-.97-.27-.1-.47-.15-.67.15-.2.3-.77.97-.94 1.16-.17.2-.35.22-.64.08-.3-.15-1.26-.46-2.4-1.48-.88-.79-1.48-1.76-1.65-2.06-.17-.3-.02-.46.13-.6.13-.14.3-.35.45-.52.15-.18.2-.3.3-.5.1-.2.05-.37-.03-.52-.07-.15-.67-1.61-.92-2.2-.24-.58-.49-.5-.67-.51h-.57c-.2 0-.52.07-.8.37-.27.3-1.04 1.02-1.04 2.48s1.07 2.87 1.21 3.07c.15.2 2.1 3.2 5.08 4.49.71.3 1.26.49 1.69.62.71.23 1.36.2 1.87.12.57-.09 1.76-.72 2-1.41.25-.7.25-1.29.18-1.42-.07-.12-.27-.2-.57-.35M12.05 21.8h-.01a9.87 9.87 0 0 1-5.03-1.38l-.36-.21-3.74.98 1-3.65-.24-.37a9.86 9.86 0 0 1-1.51-5.26c0-5.45 4.44-9.88 9.89-9.88 2.64 0 5.12 1.03 6.99 2.9a9.82 9.82 0 0 1 2.89 6.99c0 5.45-4.44 9.88-9.89 9.88m8.41-18.3A11.82 11.82 0 0 0 12.05 0C5.5 0 .16 5.34.16 11.89c0 2.1.55 4.14 1.59 5.95L.06 24l6.3-1.65a11.88 11.88 0 0 0 5.69 1.45h.01c6.55 0 11.89-5.34 11.89-11.89 0-3.18-1.24-6.17-3.49-8.41Z"/></svg>
                        </span>
                        <span>
                            <h4>WhatsApp</h4>
                            <p>{{ $profile->whatsapp }}</p>
                        </span>
                    </a>
                @endif
                <div class="contact-item">
                    <span class="icon-chip" style="background:#E3EFFB">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="14" rx="3"></rect><path d="m4 7 8 6 8-6"></path></svg>
                    </span>
                    <span>
                        <h4>Email</h4>
                        <p>{{ $profile->email ?? 'halo@terashilda.id' }}</p>
                    </span>
                </div>
            </div>
        </div>

        <div data-reveal="right" data-delay="100">
            <div class="form-card">
                <span class="tape"></span>
                <h3 class="display" style="font-size:1.3rem;margin-bottom:6px">Kirim Pesan</h3>
                <p style="font-size:0.85rem;color:var(--ink-soft);margin-bottom:22px">Kami balas secepat mungkin, biasanya kurang dari 1x24 jam.</p>
                @livewire('contact-form-component')
            </div>
        </div>
    </div>
</section>
