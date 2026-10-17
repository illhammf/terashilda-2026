<div>
    @if($isOpen)
        <div class="drawer-overlay" wire:click="close"></div>
        <aside class="drawer" role="dialog" aria-label="Keranjang belanja">
            <div class="drawer-head">
                <h2 class="display">
                    Keranjang
                    @if($this->count > 0)
                        <span class="drawer-count">{{ $this->count }} item</span>
                    @endif
                </h2>
                <button type="button" class="icon-btn" wire:click="close" aria-label="Tutup keranjang">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round"><path d="M6 6l12 12M6 18 18 6"></path></svg>
                </button>
            </div>

            @if(empty($cart))
                <div class="empty-state">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"><path d="M4 11h16a1 1 0 0 1 1 1 8 8 0 0 1-8 8h-2a8 8 0 0 1-8-8 1 1 0 0 1 1-1Z"></path><path d="M9 7c0-1.5 1-2 1-3.5"></path><path d="M14 7c0-1.5 1-2 1-3.5"></path></svg>
                    <p>Keranjangmu masih kosong.<br>Yuk pilih menu favoritmu dulu!</p>
                    <button type="button" class="btn btn-cabai" wire:click="close" style="margin-top:8px">Mulai Pesan</button>
                </div>
            @else
                <div class="drawer-body">
                    @foreach($cart as $id => $item)
                        <div class="cart-item">
                            <div class="cart-thumb">
                                @if(!empty($item['image']))
                                    <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}">
                                @else
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 11h16a1 1 0 0 1 1 1 8 8 0 0 1-8 8h-2a8 8 0 0 1-8-8 1 1 0 0 1 1-1Z"></path><path d="M9 7c0-1.5 1-2 1-3.5"></path><path d="M14 7c0-1.5 1-2 1-3.5"></path></svg>
                                @endif
                            </div>
                            <div>
                                <p class="cart-name">{{ $item['name'] }}</p>
                                <p class="cart-price">Rp {{ number_format($item['price'], 0, ',', '.') }}</p>
                                <div class="qty-row">
                                    <button type="button" class="qty-btn" wire:click="decrement({{ $id }})" aria-label="Kurangi">&minus;</button>
                                    <span class="qty-val">{{ $item['quantity'] }}</span>
                                    <button type="button" class="qty-btn" wire:click="increment({{ $id }})" aria-label="Tambah">+</button>
                                </div>
                                <input type="text" class="cart-notes" placeholder="Catatan (pedas, tanpa sayur...)" wire:model.debounce.500ms="cart.{{ $id }}.notes" wire:change="updateNotes({{ $id }}, $event.target.value)">
                            </div>
                            <div class="cart-item-side">
                                <button type="button" class="cart-remove" wire:click="remove({{ $id }})" aria-label="Hapus item">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"></path><path d="M8 6V4a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2"></path><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"></path></svg>
                                </button>
                                <p class="cart-subtotal">Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="drawer-foot">
                    <div class="sum-row"><span>Subtotal</span><span>Rp {{ number_format($this->subtotal, 0, ',', '.') }}</span></div>
                    <div class="sum-row total"><span>Total</span><b>Rp {{ number_format($this->subtotal, 0, ',', '.') }}</b></div>
                    <div style="display:flex;gap:10px;margin-top:16px">
                        <button type="button" class="btn btn-paper" wire:click="clear" style="flex:none">Kosongkan</button>
                        <a href="{{ route('order.create') }}" class="btn btn-cabai" style="flex:1">
                            Lanjut Pesan
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"></path></svg>
                        </a>
                    </div>
                </div>
            @endif
        </aside>
    @endif
</div>
