@php
    $profile = \App\Models\BusinessProfile::active();
@endphp

<section id="tentang" class="py-24 bg-orange-50 relative overflow-hidden">
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-[-10%] right-[-10%] w-[50%] h-[50%] rounded-full bg-white blur-[120px]"></div>
        <div class="absolute bottom-[-10%] left-[-10%] w-[40%] h-[40%] rounded-full bg-orange-200 blur-[100px]"></div>
    </div>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 items-center reveal-on-scroll">
            <div>
                <div class="inline-flex items-center gap-2 rounded-full bg-orange-200 px-4 py-1.5 text-xs font-bold text-orange-700 mb-5">
                    TENTANG KAMI
                </div>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-stone-900">{{ $profile->name ?? 'Teras Hilda' }}</h2>
                <p class="mt-5 text-stone-600 leading-relaxed text-lg mb-6">{{ $profile->description ?? '' }}</p>
                <p class="mt-0 text-stone-500 leading-relaxed">{{ $profile->story ?? '' }}</p>

                <div class="mt-10 grid grid-cols-2 gap-4">
                    <div class="rounded-2xl bg-white border border-orange-100 p-6 shadow-lg shadow-orange-50/50 hover:shadow-xl transition-shadow">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-stone-900 text-white mb-3">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <p class="text-xs font-bold text-stone-900 uppercase tracking-wider">Jam Buka</p>
                        <p class="mt-1.5 text-xs text-stone-500 leading-relaxed">
                            @if($profile && $profile->opening_hours)
                                @foreach($profile->opening_hours as $day => $hours)
                                    {{ $day }}<br>{{ $hours }}
                                @endforeach
                            @else
                                Senin - Jumat<br>09:00 - 21:00
                            @endif
                        </p>
                    </div>
                    <div class="rounded-2xl bg-white border border-orange-100 p-6 shadow-lg shadow-orange-50/50 hover:shadow-xl transition-shadow">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-stone-900 text-white mb-3">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <p class="text-xs font-bold text-stone-900 uppercase tracking-wider">Lokasi</p>
                        <p class="mt-1.5 text-xs text-stone-500 leading-relaxed">{{ $profile->address ?? 'Jl. Pendidikan No. 45, Yogyakarta' }}</p>
                    </div>
                    <div class="rounded-2xl bg-white border border-orange-100 p-6 shadow-lg shadow-orange-50/50 hover:shadow-xl transition-shadow">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-stone-900 text-white mb-3">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </div>
                        <p class="text-xs font-bold text-stone-900 uppercase tracking-wider">Telepon</p>
                        <p class="mt-1.5 text-xs text-stone-500">{{ $profile->phone ?? '0274-123456' }}</p>
                    </div>
                    <div class="rounded-2xl bg-white border border-orange-100 p-6 shadow-lg shadow-orange-50/50 hover:shadow-xl transition-shadow">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-stone-900 text-white mb-3">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                        </div>
                        <p class="text-xs font-bold text-stone-900 uppercase tracking-wider">WhatsApp</p>
                        <p class="mt-1.5 text-xs text-stone-500">{{ $profile->whatsapp ?? '081234567890' }}</p>
                    </div>
                </div>
            </div>
            <div class="relative reveal-on-scroll">
                <div class="rounded-3xl bg-stone-900 p-10 text-white relative overflow-hidden shadow-2xl shadow-orange-500/20">
                    <div class="absolute top-0 right-0 w-64 h-64 rounded-full bg-orange-500 blur-[100px] opacity-20"></div>
                    <div class="relative">
                        <div class="flex h-18 w-18 items-center justify-center rounded-2xl bg-gradient-to-br from-orange-500 to-red-500 mb-6 shadow-xl shadow-orange-500/40">
                            <svg class="h-9 w-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-3">Dibuat Fresh Setiap Hari</h3>
                        <p class="text-stone-400 text-sm leading-relaxed mb-8">Setiap bahan dipilih langsung dari pasar. Bumbu dan saus dibuat sendiri dengan resep warisan keluarga yang sudah terbukti.</p>
                        <div class="flex gap-6">
                            <div>
                                <p class="text-3xl font-extrabold text-orange-400">100%</p>
                                <p class="text-xs font-bold uppercase tracking-widest text-stone-400 mt-1">Fresh</p>
                            </div>
                            <div>
                                <p class="text-3xl font-extrabold text-orange-400">0</p>
                                <p class="text-xs font-bold uppercase tracking-widest text-stone-400 mt-1">Pengawet</p>
                            </div>
                            <div>
                                <p class="text-3xl font-extrabold text-orange-400">5.0</p>
                                <p class="text-xs font-bold uppercase tracking-widest text-stone-400 mt-1">Rating</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
