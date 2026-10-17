@php
    $profile = \App\Models\BusinessProfile::active();
@endphp

<section id="kontak" class="py-24 bg-white relative overflow-hidden">
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] rounded-full bg-orange-100 blur-[120px]"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[30%] h-[30%] rounded-full bg-orange-100 blur-[100px]"></div>
    </div>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16">
            <div class="reveal-on-scroll">
                <div class="inline-flex items-center gap-2 rounded-full bg-orange-100 px-4 py-1.5 text-xs font-bold text-orange-700 mb-5">
                    HUBUNGI KAMI
                </div>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-stone-900">Ada Pertanyaan?</h2>
                <p class="mt-4 text-stone-500 text-lg">Punya pertanyaan atau ingin pesan catering? Hubungi kami!</p>

                <div class="mt-10 space-y-4">
                    <div class="flex items-center gap-4 rounded-2xl bg-stone-50 border border-stone-200 p-6 hover:bg-orange-50 hover:border-orange-200 transition-all cursor-pointer">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-stone-900 text-white flex-shrink-0">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-stone-900 uppercase tracking-wider">Alamat</p>
                            <p class="text-sm font-semibold text-stone-900 mt-0.5">{{ $profile->address ?? 'Jl. Pendidikan No. 45, Yogyakarta' }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4 rounded-2xl bg-stone-50 border border-stone-200 p-6 hover:bg-orange-50 hover:border-orange-200 transition-all cursor-pointer">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-stone-900 text-white flex-shrink-0">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-stone-900 uppercase tracking-wider">Telepon</p>
                            <p class="text-sm font-semibold text-stone-900 mt-0.5">{{ $profile->phone ?? '0274-123456' }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4 rounded-2xl bg-stone-50 border border-stone-200 p-6 hover:bg-orange-50 hover:border-orange-200 transition-all cursor-pointer">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-green-600 text-white flex-shrink-0">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-stone-900 uppercase tracking-wider">WhatsApp</p>
                            <p class="text-sm font-semibold text-stone-900 mt-0.5">{{ $profile->whatsapp ?? '081234567890' }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4 rounded-2xl bg-stone-50 border border-stone-200 p-6 hover:bg-orange-50 hover:border-orange-200 transition-all cursor-pointer">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-stone-900 text-white flex-shrink-0">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-stone-900 uppercase tracking-wider">Email</p>
                            <p class="text-sm font-semibold text-stone-900 mt-0.5">{{ $profile->email ?? 'halo@terashilda.id' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="reveal-on-scroll">
                <div class="rounded-3xl bg-stone-900 p-8 relative overflow-hidden shadow-2xl shadow-orange-500/10">
                    <div class="absolute top-0 right-0 w-48 h-48 rounded-full bg-orange-500 blur-[80px] opacity-20"></div>
                    <div class="relative">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-orange-500 to-red-500 text-white shadow-lg shadow-orange-500/40">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </div>
                            <h3 class="text-xl font-bold text-white">Kirim Pesan</h3>
                        </div>
                        <form wire:submit="submitContact" class="space-y-4">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-bold text-stone-400 mb-1.5 uppercase tracking-widest">Nama</label>
                                    <input type="text" wire:model="contact_name" class="w-full rounded-xl bg-white border-0 px-4 py-3 text-sm text-stone-900 placeholder-stone-400 ring-1 ring-inset ring-stone-200 focus:ring-2 focus:ring-orange-500" placeholder="Nama Anda">
                                    @error('contact_name') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-stone-400 mb-1.5 uppercase tracking-widest">Email</label>
                                    <input type="email" wire:model="contact_email" class="w-full rounded-xl bg-white border-0 px-4 py-3 text-sm text-stone-900 placeholder-stone-400 ring-1 ring-inset ring-stone-200 focus:ring-2 focus:ring-orange-500" placeholder="email@contoh.com">
                                    @error('contact_email') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-stone-400 mb-1.5 uppercase tracking-widest">Subjek</label>
                                <input type="text" wire:model="contact_subject" class="w-full rounded-xl bg-white border-0 px-4 py-3 text-sm text-stone-900 placeholder-stone-400 ring-1 ring-inset ring-stone-200 focus:ring-2 focus:ring-orange-500" placeholder="Subjek pesan">
                                @error('contact_subject') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-stone-400 mb-1.5 uppercase tracking-widest">Pesan</label>
                                <textarea wire:model="contact_message" rows="4" class="w-full rounded-xl bg-white border-0 px-4 py-3 text-sm text-stone-900 placeholder-stone-400 ring-1 ring-inset ring-stone-200 focus:ring-2 focus:ring-orange-500 resize-none" placeholder="Tulis pesan Anda..."></textarea>
                                @error('contact_message') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror
                            </div>
                            <button type="submit" wire:click="submitContact" class="w-full rounded-xl btn-orange py-4 text-sm font-bold text-white hover:shadow-orange-400 transition-all shadow-lg shadow-orange-200 active:scale-95">
                                Kirim Pesan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
