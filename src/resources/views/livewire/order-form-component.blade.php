<div class="form-card">
    <span class="tape"></span>

    @if(empty($cart))
        <div class="empty-state">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"><path d="M4 11h16a1 1 0 0 1 1 1 8 8 0 0 1-8 8h-2a8 8 0 0 1-8-8 1 1 0 0 1 1-1Z"></path><path d="M9 7c0-1.5 1-2 1-3.5"></path><path d="M14 7c0-1.5 1-2 1-3.5"></path></svg>
            <p>Keranjangmu masih kosong.<br>Pilih menu favoritmu dulu ya!</p>
            <a href="/#menu" class="btn btn-cabai" style="margin-top:8px">Lihat Menu</a>
        </div>
    @else
        <form wire:submit="submit">
            <div class="step-head">
                <span class="step-num display">1</span>
                <h3 class="display">Data Pemesan</h3>
            </div>
            <div class="form-grid-2" style="margin-bottom:18px">
                <div>
                    <label class="label">Nama Lengkap *</label>
                    <input type="text" wire:model="customer_name" class="input" placeholder="Nama kamu">
                    @error('customer_name') <p class="field-error">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="label">Nomor HP *</label>
                    <input type="tel" wire:model="customer_phone" class="input" placeholder="08xxxxxxxxxx">
                    @error('customer_phone') <p class="field-error">{{ $message }}</p> @enderror
                </div>
            </div>
            <div style="margin-bottom:8px">
                <label class="label">Email (opsional)</label>
                <input type="email" wire:model="customer_email" class="input" placeholder="email@contoh.com">
                @error('customer_email') <p class="field-error">{{ $message }}</p> @enderror
            </div>

            <div class="step-head">
                <span class="step-num display">2</span>
                <h3 class="display">Metode Pengambilan</h3>
            </div>
            <div class="form-grid-2" style="margin-bottom:18px">
                <label class="choice">
                    <input type="radio" wire:model.live="pickup_type" value="pickup">
                    <span class="choice-box">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 7V6a6 6 0 1 1 12 0v1"></path><path d="M4 7h16l1 13a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2L4 7Z"></path></svg>
                        Ambil Sendiri
                    </span>
                </label>
                <label class="choice">
                    <input type="radio" wire:model.live="pickup_type" value="delivery">
                    <span class="choice-box">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 18a2 2 0 1 0 4 0 2 2 0 0 0-4 0Z"></path><path d="M15 18a2 2 0 1 0 4 0 2 2 0 0 0-4 0Z"></path><path d="M13 6h4l3 5v5h-1"></path><path d="M9 18H5V6h8v12"></path></svg>
                        Diantar (+Rp 5.000)
                    </span>
                </label>
            </div>
            @if($pickup_type === 'delivery')
                <div style="margin-bottom:18px">
                    <label class="label">Alamat Pengantaran *</label>
                    <textarea wire:model="delivery_address" rows="2" class="input" style="resize:none" placeholder="Alamat lengkap, patokan, nomor kos"></textarea>
                    @error('delivery_address') <p class="field-error">{{ $message }}</p> @enderror
                </div>
            @endif

            <div class="step-head">
                <span class="step-num display">3</span>
                <h3 class="display">Metode Pembayaran</h3>
            </div>
            <div class="form-grid-4" style="margin-bottom:18px">
                <label class="choice">
                    <input type="radio" wire:model="payment_method" value="cash">
                    <span class="choice-box">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="6" width="20" height="12" rx="3"></rect><circle cx="12" cy="12" r="3"></circle></svg>
                        Tunai
                    </span>
                </label>
                <label class="choice">
                    <input type="radio" wire:model="payment_method" value="transfer">
                    <span class="choice-box">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21h18"></path><path d="M5 21V7l7-4 7 4v14"></path><path d="M9 21v-6h6v6"></path></svg>
                        Transfer
                    </span>
                </label>
                <label class="choice">
                    <input type="radio" wire:model="payment_method" value="qris">
                    <span class="choice-box">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7" rx="1.5"></rect><rect x="14" y="3" width="7" height="7" rx="1.5"></rect><rect x="3" y="14" width="7" height="7" rx="1.5"></rect><path d="M14 14h3v3h-3zM20 20h1M14 20h1M20 14h1"></path></svg>
                        QRIS
                    </span>
                </label>
                <label class="choice">
                    <input type="radio" wire:model="payment_method" value="ewallet">
                    <span class="choice-box">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="5" width="20" height="14" rx="3"></rect><path d="M2 10h20"></path><path d="M16 15h3"></path></svg>
                        E-Wallet
                    </span>
                </label>
            </div>

            <div style="margin-bottom:24px">
                <label class="label">Catatan Pesanan (opsional)</label>
                <textarea wire:model="notes" rows="2" class="input" style="resize:none" placeholder="Contoh: level pedas 3, tanpa bawang"></textarea>
                @error('notes') <p class="field-error">{{ $message }}</p> @enderror
            </div>

            <div class="summary-card" style="margin-bottom:24px">
                <h4 class="display" style="font-size:0.95rem;margin-bottom:12px">Ringkasan Pesanan</h4>
                @foreach($cart as $item)
                    <div class="sum-row">
                        <span>{{ $item['name'] }} x{{ $item['quantity'] }}</span>
                        <span>Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</span>
                    </div>
                @endforeach
                <div class="sum-row" style="border-top:2px dashed rgba(35,26,18,0.25);margin-top:8px;padding-top:10px">
                    <span>Subtotal</span>
                    <span>Rp {{ number_format($this->subtotal, 0, ',', '.') }}</span>
                </div>
                @if($delivery_fee > 0)
                    <div class="sum-row"><span>Ongkos Kirim</span><span>Rp {{ number_format($delivery_fee, 0, ',', '.') }}</span></div>
                @endif
                <div class="sum-row total"><span>Total Bayar</span><b>Rp {{ number_format($this->total, 0, ',', '.') }}</b></div>
            </div>

            @error('cart') <p class="field-error" style="margin-bottom:12px">{{ $message }}</p> @enderror

            <button type="submit" class="btn btn-cabai btn-lg btn-block" data-burst>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M5 13l4 4L19 7"></path></svg>
                Buat Pesanan Sekarang
            </button>
        </form>
    @endif
</div>
