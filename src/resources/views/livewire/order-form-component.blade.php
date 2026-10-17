<div class="bg-white rounded-3xl border border-stone-200 p-8 sm:p-10 shadow-lg shadow-stone-100/50 reveal-on-scroll">
    <div class="flex items-center gap-3 mb-8">
        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-stone-900 text-white shadow-lg shadow-orange-500/20">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
        </div>
        <div>
            <h2 class="text-xl font-bold text-stone-900">Data Pengiriman</h2>
            <p class="text-xs text-stone-500">Isi data diri dan detail pesanan Anda</p>
        </div>
    </div>

    @if(empty($cart))
        <div class="text-center py-16">
            <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-stone-100 mx-auto mb-4">
                <svg class="h-8 w-8 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z"/></svg>
            </div>
            <p class="text-stone-500 mb-4">Keranjang masih kosong. Silakan pilih menu terlebih dahulu.</p>
            <a href="/#menu" class="inline-flex items-center gap-2 rounded-xl btn-orange px-7 py-3 text-sm font-bold text-white shadow-lg shadow-orange-300 hover:shadow-orange-400 transition-all active:scale-95">
                Lihat Menu
            </a>
        </div>
    @else
        <form wire:submit="submit" class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-bold text-stone-700 mb-1.5 uppercase tracking-widest">Nama Lengkap *</label>
                    <input type="text" wire:model="customer_name" class="w-full rounded-xl border-0 px-4 py-3.5 text-sm ring-1 ring-inset ring-stone-300 focus:ring-2 focus:ring-orange-500 bg-stone-50" placeholder="Nama Anda">
                    @error('customer_name') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-xs font-bold text-stone-700 mb-1.5 uppercase tracking-widest">Nomor HP *</label>
                    <input type="tel" wire:model="customer_phone" class="w-full rounded-xl border-0 px-4 py-3.5 text-sm ring-1 ring-inset ring-stone-300 focus:ring-2 focus:ring-orange-500 bg-stone-50" placeholder="08xxxxxxxxxx">
                    @error('customer_phone') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-stone-700 mb-1.5 uppercase tracking-widest">Email (opsional)</label>
                <input type="email" wire:model="customer_email" class="w-full rounded-xl border-0 px-4 py-3.5 text-sm ring-1 ring-inset ring-stone-300 focus:ring-2 focus:ring-orange-500 bg-stone-50" placeholder="email@contoh.com">
                @error('customer_email') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-xs font-bold text-stone-700 mb-2 uppercase tracking-widest">Metode Pengambilan</label>
                <div class="grid grid-cols-2 gap-3">
                    <label class="cursor-pointer">
                        <input type="radio" wire:model="pickup_type" value="pickup" class="peer sr-only">
                        <div class="rounded-xl border-2 border-stone-200 p-5 text-center text-sm font-semibold text-stone-600 peer-checked:border-orange-500 peer-checked:bg-orange-50 peer-checked:text-orange-700 transition-all shadow-sm hover:shadow-md">
                            <svg class="h-5 w-5 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                            Ambil Sendiri
                        </div>
                    </label>
                    <label class="cursor-pointer">
                        <input type="radio" wire:model="pickup_type" value="delivery" class="peer sr-only">
                        <div class="rounded-xl border-2 border-stone-200 p-5 text-center text-sm font-semibold text-stone-600 peer-checked:border-orange-500 peer-checked:bg-orange-50 peer-checked:text-orange-700 transition-all shadow-sm hover:shadow-md">
                            <svg class="h-5 w-5 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"/></svg>
                            Diantar
                        </div>
                    </label>
                </div>
            </div>

            @if($pickup_type === 'delivery')
                <div>
                    <label class="block text-xs font-bold text-stone-700 mb-1.5 uppercase tracking-widest">Alamat Pengantaran *</label>
                    <textarea wire:model="delivery_address" rows="2" class="w-full rounded-xl border-0 px-4 py-3.5 text-sm ring-1 ring-inset ring-stone-300 focus:ring-2 focus:ring-orange-500 bg-stone-50 resize-none" placeholder="Alamat lengkap untuk pengantaran"></textarea>
                    @error('delivery_address') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>
            @endif

            <div>
                <label class="block text-xs font-bold text-stone-700 mb-2 uppercase tracking-widest">Metode Pembayaran</label>
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-2">
                    @foreach(['cash' => 'Tunai', 'transfer' => 'Transfer', 'qris' => 'QRIS', 'ewallet' => 'E-Wallet'] as $value => $label)
                        <label class="cursor-pointer">
                            <input type="radio" wire:model="payment_method" value="{{ $value }}" class="peer sr-only">
                            <div class="rounded-xl border-2 border-stone-200 p-3 text-center text-xs font-bold text-stone-600 peer-checked:border-orange-500 peer-checked:bg-orange-50 peer-checked:text-orange-700 transition-all shadow-sm hover:shadow-md">
                                {{ $label }}
                            </div>
                        </label>
                    @endforeach
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-stone-700 mb-1.5 uppercase tracking-widest">Catatan</label>
                <textarea wire:model="notes" rows="2" class="w-full rounded-xl border-0 px-4 py-3.5 text-sm ring-1 ring-inset ring-stone-300 focus:ring-2 focus:ring-orange-500 bg-stone-50 resize-none" placeholder="Catatan untuk pesanan (opsional)"></textarea>
            </div>

            <div class="rounded-2xl bg-stone-50 border border-stone-200 p-6 space-y-3">
                @foreach($cart as $item)
                    <div class="flex justify-between text-sm">
                        <span class="text-stone-600">{{ $item['name'] }} <span class="text-stone-400">x{{ $item['quantity'] }}</span></span>
                        <span class="font-bold text-stone-900">Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</span>
                    </div>
                @endforeach
                <div class="border-t border-stone-200 pt-3 flex justify-between text-sm">
                    <span class="text-stone-500">Subtotal</span>
                    <span class="font-bold text-stone-900">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                </div>
                @if($delivery_fee > 0)
                    <div class="flex justify-between text-sm">
                        <span class="text-stone-500">Ongkir</span>
                        <span class="font-bold text-stone-900">Rp {{ number_format($delivery_fee, 0, ',', '.') }}</span>
                    </div>
                @endif
                <div class="flex justify-between text-lg font-bold border-t border-stone-200 pt-3">
                    <span class="text-stone-900">Total</span>
                    <span class="text-orange-600">Rp {{ number_format($total, 0, ',', '.') }}</span>
                </div>
            </div>

            <button type="submit" class="w-full rounded-xl btn-orange py-4 text-sm font-bold text-white shadow-lg shadow-orange-300 hover:shadow-orange-400 transition-all active:scale-95">
                Buat Pesanan
            </button>
        </form>
    @endif
</div>
