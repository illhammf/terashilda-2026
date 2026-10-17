<div class="bg-white rounded-2xl shadow-lg p-6">
    <h2 class="text-xl font-bold text-gray-900 mb-4">Data Pengiriman</h2>

    @if(empty($cart))
        <div class="text-center py-8">
            <div class="text-5xl mb-3">🛒</div>
            <p class="text-gray-500 mb-4">Keranjang masih kosong. Silakan pilih menu terlebih dahulu.</p>
            <a href="/#menu" class="inline-block rounded-lg bg-orange-600 px-6 py-2 text-sm font-bold text-white hover:bg-orange-700">Lihat Menu</a>
        </div>
    @else
        <form wire:submit="submit" class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap *</label>
                    <input type="text" wire:model="customer_name" class="w-full rounded-lg border-0 px-3 py-2.5 text-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-orange-500" placeholder="Nama Anda">
                    @error('customer_name') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nomor HP *</label>
                    <input type="tel" wire:model="customer_phone" class="w-full rounded-lg border-0 px-3 py-2.5 text-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-orange-500" placeholder="08xxxxxxxxxx">
                    @error('customer_phone') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email (opsional)</label>
                <input type="email" wire:model="customer_email" class="w-full rounded-lg border-0 px-3 py-2.5 text-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-orange-500" placeholder="email@contoh.com">
                @error('customer_email') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Metode Pengambilan</label>
                <div class="flex gap-3">
                    <label class="flex-1 cursor-pointer">
                        <input type="radio" wire:model="pickup_type" value="pickup" class="peer sr-only">
                        <div class="rounded-lg border-2 border-gray-200 p-3 text-center text-sm font-medium peer-checked:border-orange-500 peer-checked:bg-orange-50 peer-checked:text-orange-700">
                            Ambil Sendiri
                        </div>
                    </label>
                    <label class="flex-1 cursor-pointer">
                        <input type="radio" wire:model="pickup_type" value="delivery" class="peer sr-only">
                        <div class="rounded-lg border-2 border-gray-200 p-3 text-center text-sm font-medium peer-checked:border-orange-500 peer-checked:bg-orange-50 peer-checked:text-orange-700">
                            Diantar
                        </div>
                    </label>
                </div>
            </div>

            @if($pickup_type === 'delivery')
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Alamat Pengantaran *</label>
                    <textarea wire:model="delivery_address" rows="2" class="w-full rounded-lg border-0 px-3 py-2.5 text-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-orange-500" placeholder="Alamat lengkap untuk pengantaran"></textarea>
                    @error('delivery_address') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>
            @endif

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Metode Pembayaran</label>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-2">
                    @foreach(['cash' => 'Tunai', 'transfer' => 'Transfer', 'qris' => 'QRIS', 'ewallet' => 'E-Wallet'] as $value => $label)
                        <label class="cursor-pointer">
                            <input type="radio" wire:model="payment_method" value="{{ $value }}" class="peer sr-only">
                            <div class="rounded-lg border-2 border-gray-200 p-2.5 text-center text-xs font-medium peer-checked:border-orange-500 peer-checked:bg-orange-50 peer-checked:text-orange-700">
                                {{ $label }}
                            </div>
                        </label>
                    @endforeach
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Catatan</label>
                <textarea wire:model="notes" rows="2" class="w-full rounded-lg border-0 px-3 py-2.5 text-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-orange-500" placeholder="Catatan untuk pesanan (opsional)"></textarea>
            </div>

            <div class="rounded-xl bg-gray-50 p-4 space-y-2">
                @foreach($cart as $item)
                    <div class="flex justify-between text-sm">
                        <span>{{ $item['name'] }} x{{ $item['quantity'] }}</span>
                        <span class="font-medium">Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</span>
                    </div>
                @endforeach
                <div class="border-t pt-2 flex justify-between text-sm">
                    <span class="text-gray-600">Subtotal</span>
                    <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                </div>
                @if($delivery_fee > 0)
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Ongkir</span>
                        <span>Rp {{ number_format($delivery_fee, 0, ',', '.') }}</span>
                    </div>
                @endif
                <div class="flex justify-between text-base font-bold border-t pt-2">
                    <span>Total</span>
                    <span class="text-orange-600">Rp {{ number_format($total, 0, ',', '.') }}</span>
                </div>
            </div>

            <button type="submit" class="w-full rounded-xl bg-orange-600 py-3.5 text-sm font-bold text-white hover:bg-orange-700 transition-colors shadow-lg shadow-orange-200">
                Buat Pesanan
            </button>
        </form>
    @endif
</div>
