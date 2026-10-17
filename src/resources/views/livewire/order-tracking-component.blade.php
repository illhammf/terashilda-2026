<div>
    <div class="card" style="padding:22px;margin-bottom:26px">
        <form wire:submit="track" style="display:flex;gap:12px;flex-wrap:wrap">
            <div style="flex:1;min-width:220px">
                <label class="label">Nomor Pesanan / Nomor HP</label>
                <input type="text" wire:model="search" class="input" placeholder="Contoh: TH-20260101-XXXXX">
            </div>
            <button type="submit" class="btn btn-ink" style="align-self:flex-end" data-magnet data-burst>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="7"></circle><path d="m21 21-4.3-4.3"></path></svg>
                Lacak
            </button>
        </form>
        @error('search') <p class="field-error" style="margin-top:10px">{{ $message }}</p> @enderror
    </div>

    @if($notFound)
        <div class="card center" style="padding:46px 24px" data-reveal="scale">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" style="width:64px;height:64px;margin:0 auto 14px;opacity:0.5"><circle cx="11" cy="11" r="7"></circle><path d="m21 21-4.3-4.3"></path><path d="M8.5 11h5"></path></svg>
            <p style="font-weight:700">Pesanan tidak ditemukan</p>
            <p style="font-size:0.85rem;color:var(--ink-soft);margin-top:6px">Periksa kembali nomor pesanan atau nomor HP yang kamu pakai saat memesan.</p>
        </div>
    @endif

    @if($order)
        @php
            $steps = [
                'pending' => ['label' => 'Pesanan Diterima', 'desc' => 'Pesananmu sudah masuk ke dapur'],
                'confirmed' => ['label' => 'Dikonfirmasi', 'desc' => 'Pesanan sedang diverifikasi'],
                'processing' => ['label' => 'Sedang Dimasak', 'desc' => 'Koki kami sedang menyiapkan pesananmu'],
                'ready' => ['label' => 'Siap Diambil', 'desc' => 'Pesanan siap diambil atau sedang diantar'],
                'completed' => ['label' => 'Selesai', 'desc' => 'Terima kasih sudah memesan!'],
            ];
            $currentIndex = array_search($order->status, array_keys($steps), true);
            $isCancelled = $order->status === 'cancelled';
        @endphp

        <div class="card" style="padding:26px;margin-bottom:26px" data-reveal="up">
            <div style="display:flex;justify-content:space-between;align-items:center;gap:16px;flex-wrap:wrap;margin-bottom:20px">
                <div>
                    <p class="label" style="margin-bottom:4px">Nomor Pesanan</p>
                    <p class="display" style="font-size:1.5rem">{{ $order->order_number }}</p>
                </div>
                <span class="status-chip status-{{ $order->status }}">{{ $order->status_label }}</span>
            </div>
            <div class="form-grid-2">
                <div class="sum-row"><span>Nama</span><b>{{ $order->customer_name }}</b></div>
                <div class="sum-row"><span>Metode</span><b>{{ $order->pickup_type === 'pickup' ? 'Ambil Sendiri' : 'Diantar' }}</b></div>
                <div class="sum-row"><span>Pembayaran</span><b>{{ $order->payment_method_label ?? '-' }} ({{ $order->payment_status_label }})</b></div>
                <div class="sum-row"><span>Total</span><b style="color:var(--cabai)">Rp {{ number_format($order->total, 0, ',', '.') }}</b></div>
            </div>
        </div>

        @if($isCancelled)
            <div class="card" style="padding:22px;margin-bottom:26px;background:#FFDFD6" data-reveal="up">
                <p style="font-weight:800">Pesanan ini dibatalkan.</p>
                <p style="font-size:0.85rem;color:var(--ink-soft);margin-top:4px">Kalau ada pertanyaan, hubungi kami lewat WhatsApp ya.</p>
            </div>
        @else
            <div class="card" style="padding:26px;margin-bottom:26px" data-reveal="up" data-delay="80">
                <h3 class="display" style="font-size:1.1rem;margin-bottom:22px">Status Pesanan</h3>
                <div class="timeline">
                    @foreach($steps as $key => $step)
                        @php
                            $stepIndex = array_search($key, array_keys($steps), true);
                            $state = $currentIndex === false ? '' : ($stepIndex < $currentIndex ? 'done' : ($stepIndex === $currentIndex ? 'current' : ''));
                        @endphp
                        <div class="tl-step {{ $state }}">
                            <div class="tl-node">
                                @if($state === 'done')
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 13l4 4L19 7"></path></svg>
                                @elseif($state === 'current')
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 7v5l3 3"></path><circle cx="12" cy="12" r="9"></circle></svg>
                                @else
                                    <span style="width:10px;height:10px;border-radius:50%;background:rgba(35,26,18,0.25);display:block"></span>
                                @endif
                            </div>
                            <div>
                                <p class="tl-label">
                                    {{ $step['label'] }}
                                    @if($state === 'current')
                                        <span class="now-chip">SEKARANG</span>
                                    @endif
                                </p>
                                <p class="tl-desc">{{ $step['desc'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <div class="card" style="padding:26px" data-reveal="up" data-delay="140">
            <h3 class="display" style="font-size:1.1rem;margin-bottom:16px">Detail Pesanan</h3>
            @foreach($order->items as $item)
                <div class="sum-row" style="padding:9px 0;border-bottom:1px dashed rgba(35,26,18,0.18)">
                    <span>
                        <b style="color:var(--ink)">{{ $item->menu_name }}</b> x{{ $item->quantity }}
                        @if($item->notes)
                            <em style="display:block;font-size:0.75rem">Catatan: {{ $item->notes }}</em>
                        @endif
                    </span>
                    <span>Rp {{ number_format($item->subtotal, 0, ',', '.') }}</span>
                </div>
            @endforeach
            <div class="sum-row" style="margin-top:10px"><span>Subtotal</span><span>Rp {{ number_format($order->subtotal, 0, ',', '.') }}</span></div>
            @if($order->delivery_fee > 0)
                <div class="sum-row"><span>Ongkos Kirim</span><span>Rp {{ number_format($order->delivery_fee, 0, ',', '.') }}</span></div>
            @endif
            <div class="sum-row total"><span>Total</span><b>Rp {{ number_format($order->total, 0, ',', '.') }}</b></div>
        </div>
    @endif
</div>
