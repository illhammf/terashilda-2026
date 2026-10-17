@php
    use App\Models\Testimonial;

    $testimonials = Testimonial::approved()->latest()->take(9)->get();
    $avgRating = round((float) ($testimonials->avg('rating') ?? 0), 1);
    $avatarBg = ['#F5B301', '#DDF0E4', '#FFDFD6', '#E3EFFB'];
@endphp

<section id="testimoni" class="section testi-section">
    <div class="wrap">
        <div class="section-head center" data-reveal>
            <span class="sticker rot-1">Testimoni</span>
            <h2 class="section-title display">Kata <span class="mark-2">Mereka</span></h2>
            <p class="section-sub head-center">Cerita jujur dari pelanggan yang sudah mencoba.</p>
            @if($testimonials->count() > 0)
                <div class="rating-banner" style="margin-top:22px">
                    <span class="big display">{{ number_format($avgRating, 1, ',', '.') }}</span>
                    <span class="stars">
                        @for($i = 1; $i <= 5; $i++)
                            <svg class="{{ $i <= round($avgRating) ? '' : 'off' }}" viewBox="0 0 20 20" fill="currentColor"><path d="M9.05 2.93c.3-.92 1.6-.92 1.9 0l1.07 3.29c.13.42.53.7.95.7h3.46c.97 0 1.37 1.24.59 1.81l-2.8 2.03a1 1 0 0 0-.36 1.12l1.07 3.29c.3.92-.76 1.69-1.54 1.12l-2.8-2.03a1 1 0 0 0-1.18 0l-2.8 2.03c-.78.57-1.84-.2-1.54-1.12l1.07-3.29a1 1 0 0 0-.36-1.12L2.98 8.73c-.78-.57-.38-1.81.59-1.81h3.46a1 1 0 0 0 .95-.7l1.07-3.29z"/></svg>
                        @endfor
                    </span>
                    <span style="font-size:0.8rem;opacity:0.8">{{ $testimonials->count() }} ulasan pelanggan</span>
                </div>
            @endif
        </div>

        <div class="testi-grid">
            @forelse($testimonials as $testimonial)
                <div class="testi-card" style="--tilt: {{ $loop->index % 2 === 0 ? '-1.2deg' : '1.1deg' }}" data-reveal data-delay="{{ ($loop->index % 3) * 90 }}">
                    <span class="tape" style="background: {{ $loop->index % 2 === 0 ? 'rgba(46,139,87,0.5)' : 'rgba(228,87,46,0.45)' }}"></span>
                    <span class="stars">
                        @for($i = 1; $i <= 5; $i++)
                            <svg class="{{ $i <= $testimonial->rating ? '' : 'off' }}" viewBox="0 0 20 20" fill="currentColor"><path d="M9.05 2.93c.3-.92 1.6-.92 1.9 0l1.07 3.29c.13.42.53.7.95.7h3.46c.97 0 1.37 1.24.59 1.81l-2.8 2.03a1 1 0 0 0-.36 1.12l1.07 3.29c.3.92-.76 1.69-1.54 1.12l-2.8-2.03a1 1 0 0 0-1.18 0l-2.8 2.03c-.78.57-1.84-.2-1.54-1.12l1.07-3.29a1 1 0 0 0-.36-1.12L2.98 8.73c-.78-.57-.38-1.81.59-1.81h3.46a1 1 0 0 0 .95-.7l1.07-3.29z"/></svg>
                        @endfor
                    </span>
                    <p class="testi-msg">"{{ $testimonial->message }}"</p>
                    <div class="testi-who">
                        <span class="testi-avatar" style="background: {{ $avatarBg[$loop->index % 4] }}">{{ strtoupper(substr($testimonial->name, 0, 1)) }}</span>
                        <span>
                            <span class="testi-name display" style="display:block">{{ $testimonial->name }}</span>
                            <span class="testi-origin">{{ $testimonial->origin }}</span>
                        </span>
                    </div>
                </div>
            @empty
                <div class="card center" style="padding:44px;grid-column:1/-1" data-reveal>
                    <p style="font-weight:700">Belum ada testimoni. Jadilah yang pertama mencoba!</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
