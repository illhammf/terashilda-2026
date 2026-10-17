@php
    $testimonials = \App\Models\Testimonial::approved()->latest()->get();
    $avgRating = $testimonials->avg('rating') ?? 0;
@endphp

<section id="testimoni" class="py-24 bg-stone-900 relative overflow-hidden">
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] rounded-full bg-orange-900/30 blur-[120px]"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[30%] h-[30%] rounded-full bg-red-900/30 blur-[100px]"></div>
    </div>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 reveal-on-scroll">
            <div class="inline-flex items-center gap-2 rounded-full bg-orange-500/20 px-4 py-1.5 text-xs font-bold text-orange-400 mb-4">
                TESTIMONI
            </div>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-white">Kata Mereka</h2>
            <p class="mt-3 text-stone-400 max-w-lg mx-auto">Apa kata pelanggan tentang kami</p>
            @if($testimonials->count() > 0)
                <div class="mt-4 inline-flex items-center gap-2 rounded-full bg-white/10 border border-white/10 px-4 py-2">
                    <span class="text-orange-400 text-xs tracking-tight">★★★★★</span>
                    <span class="text-sm font-bold text-white">{{ number_format($avgRating, 1) }}</span>
                    <span class="text-xs text-stone-400">({{ $testimonials->count() }} ulasan)</span>
                </div>
            @endif
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($testimonials as $testimonial)
                <div class="glass-card rounded-3xl p-6 hover:border-orange-400/50 transition-all duration-300 shadow-xl shadow-stone-900/50">
                    <div class="flex items-center gap-0.5 mb-4">
                        @for($i = 1; $i <= 5; $i++)
                            <svg class="h-4 w-4 {{ $i <= $testimonial->rating ? 'text-orange-400' : 'text-stone-700' }}" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        @endfor
                    </div>
                    <p class="text-sm text-stone-300 leading-relaxed mb-5 italic">"{{ $testimonial->message }}"</p>
                    <div class="flex items-center gap-3">
                        <div class="h-11 w-11 rounded-full bg-gradient-to-br from-orange-400 to-red-400 flex items-center justify-center text-white text-xs font-bold shadow-lg shadow-orange-500/40">
                            {{ strtoupper(substr($testimonial->name, 0, 1)) }}
                        </div>
                        <div>
                            <p class="text-sm font-bold text-white">{{ $testimonial->name }}</p>
                            <p class="text-xs text-stone-400 uppercase tracking-widest">{{ $testimonial->origin }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-16 reveal-on-scroll">
                    <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-white/10 mx-auto mb-4">
                        <svg class="h-8 w-8 text-stone-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                    </div>
                    <p class="text-stone-400">Belum ada testimoni. Jadilah yang pertama!</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
