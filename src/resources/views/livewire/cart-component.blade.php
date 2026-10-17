<div>
    @if($isOpen)
        <div class="fixed inset-0 z-50 overflow-hidden" role="dialog" aria-modal="true">
            <div class="absolute inset-0 bg-stone-900/60 backdrop-blur-md transition-opacity" wire:click="close"></div>
            <div class="absolute right-0 top-0 flex h-full w-full max-w-md flex-col bg-white shadow-2xl">
                <div class="flex items-center justify-between border-b border-orange-100 px-6 py-5">
                    <h2 class="text-lg font-bold text-stone-900">Keranjang Belanja</h2>
                    <button wire:click="close" class="rounded-xl p-2 text-stone-400 hover:bg-orange-50 hover:text-orange-700 transition-colors">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                @if(empty($cart))
                    <div class="flex flex-1 flex-col items-center justify-center p-8 text-center">
                        <div class="flex h-20 w-20 items-center justify-center rounded-2xl bg-stone-100 mb-4">
                            <svg class="h-10 w-10 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z"/></svg>
                        </div>
                        <p class="text-stone-500 font-medium">Keranjang masih kosong</p>
                        <button wire:click="close" class="mt-4 text-sm font-bold text-orange-600 hover:text-orange-700">Mulai Belanja</button>
                    </div>
                @else
                    <div class="flex-1 overflow-y-auto p-6 space-y-5">
                        @foreach($cart as $id => $item)
                            <div class="flex gap-4 rounded-2xl bg-stone-50 border border-stone-100 p-4 hover:border-orange-200 transition-all">
                                <div class="h-16 w-16 flex-shrink-0 rounded-xl bg-white border border-stone-200 flex items-center justify-center shadow-sm">
                                    <svg class="h-8 w-8 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/></svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h3 class="font-bold text-stone-900 text-sm truncate">{{ $item['name'] }}</h3>
                                    <p class="text-sm text-orange-600 font-bold mt-0.5">Rp {{ number_format($item['price'], 0, ',', '.') }}</p>
                                    <div class="mt-2 flex items-center gap-2">
                                        <button wire:click="decrement({{ $id }})" class="h-8 w-8 rounded-lg bg-white border border-stone-200 text-stone-600 hover:bg-stone-100 flex items-center justify-center text-sm font-bold transition-colors shadow-sm">−</button>
                                        <span class="text-sm font-bold w-6 text-center text-stone-900">{{ $item['quantity'] }}</span>
                                        <button wire:click="increment({{ $id }})" class="h-8 w-8 rounded-lg bg-white border border-stone-200 text-stone-600 hover:bg-stone-100 flex items-center justify-center text-sm font-bold transition-colors shadow-sm">+</button>
                                    </div>
                                    <input type="text" wire:model.debounce.500ms="cart.{{ $id }}.notes" wire:change="updateNotes({{ $id }}, $event.target.value)" placeholder="Catatan (opsional)" class="mt-2 w-full rounded-lg border-0 px-3 py-1.5 text-xs ring-1 ring-inset ring-stone-200 focus:ring-2 focus:ring-orange-500 bg-white">
                                </div>
                                <div class="flex flex-col items-end justify-between">
                                    <button wire:click="remove({{ $id }})" class="text-stone-400 hover:text-red-500 transition-colors">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                    <p class="text-sm font-bold text-stone-900">Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="border-t border-stone-100 p-6 space-y-5">
                        <div class="flex justify-between text-sm">
                            <span class="text-stone-500">Subtotal</span>
                            <span class="font-bold text-stone-900">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between text-lg font-bold">
                            <span class="text-stone-900">Total</span>
                            <span class="text-orange-600">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                        </div>
                        <button wire:click="clear" class="w-full rounded-xl border border-stone-200 py-3 text-sm font-bold text-stone-600 hover:bg-stone-50 transition-colors shadow-sm">Kosongkan Keranjang</button>
                        <a href="{{ route('order.create') }}" class="block w-full rounded-xl btn-orange py-3.5 text-center text-sm font-bold text-white shadow-lg shadow-orange-300 hover:shadow-orange-400 transition-all active:scale-95">
                            Lanjut ke Pembayaran
                        </a>
                    </div>
                @endif
            </div>
        </div>
    @endif
</div>
