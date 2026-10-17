<div class="bg-white rounded-3xl border border-stone-200 p-8 sm:p-10 shadow-lg shadow-stone-100/50 reveal-on-scroll">
    <div class="flex items-center gap-3 mb-8">
        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-stone-900 text-white shadow-lg shadow-orange-500/20">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
        </div>
        <div>
            <h2 class="text-xl font-bold text-stone-900">Lacak Pesanan</h2>
            <p class="text-xs text-stone-500">Masukkan nomor pesanan untuk melihat status</p>
        </div>
    </div>

    <form wire:submit="track" class="flex gap-3 mb-10">
        <input type="text" wire:model="search" class="flex-1 rounded-xl border-0 px-4 py-3.5 text-sm ring-1 ring-inset ring-stone-300 focus:ring-2 focus:ring-orange-500 bg-stone-50" placeholder="Masukkan nomor pesanan (TH-20260101-XXXXX)">
        <button type="submit" class="rounded-xl bg-stone-900 px-6 py-3.5 text-sm font-bold text-white hover:bg-stone-800 transition-colors shadow-md shadow-orange-500/20">
            Lacak
        </button>
    </form>

    @error('search') <p class="mb-4 text-sm text-red-500">{{ $message }}</p> @endError

    @if($notFound)
        <div class="text-center py-12">
            <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-stone-100 mx-auto mb-4">
                <svg class="h-8 w-8 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>
            <p class="text-stone-500">Pesanan tidak ditemukan. Periksa kembali nomor pesanan Anda.</p>
        </div>
    @endif

    @if($order)
        <div class="space-y-8">
            <div class="rounded-3xl bg-stone-900 p-6 text-white relative overflow-hidden shadow-2xl shadow-orange-500/20">
                <div class="absolute top-0 right-0 w-32 h-32 rounded-full bg-orange-500 blur-[60px] opacity-20"></div>
                <div class="relative">
                    <div class="flex justify-between items-start mb-5">
                        <div>
                            <p class="text-xs text-stone-400 uppercase tracking-widest font-bold">Nomor Pesanan</p>
                            <p class="font-bold text-lg mt-0.5">{{ $order->order_number }}</p>
                        </div>
                        <span class="inline-flex items-center rounded-lg px-3 py-1.5 text-xs font-bold
                            @if($order->status === 'pending') bg-yellow-500/20 text-yellow-400
                            @elseif($order->status === 'confirmed') bg-blue-500/20 text-blue-400
                            @elseif($order->status === 'processing') bg-indigo-500/20 text-indigo-400
                            @elseif($order->status === 'ready') bg-green-500/20 text-green-400
                            @elseif($order->status === 'completed') bg-green-500/20 text-green-400
                            @else bg-red-500/20 text-red-400
                            @endif">
                            {{ $order->status_label }}
                        </span>
                    </div>

                    <div class="grid grid-cols-2 gap-5 text-sm mt-4">
                        <div>
                            <p class="text-stone-400 text-xs">Nama</p>
                            <p class="font-semibold mt-0.5">{{ $order->customer_name }}</p>
                        </div>
                        <div>
                            <p class="text-stone-400 text-xs">Pembayaran</p>
                            <p class="font-semibold mt-0.5">{{ $order->payment_method_label ?? '-' }} - {{ $order->payment_status_label }}</p>
                        </div>
                        <div>
                            <p class="text-stone-400 text-xs">Pengambilan</p>
                            <p class="font-semibold mt-0.5">{{ $order->pickup_type === 'pickup' ? 'Ambil Sendiri' : 'Diantar' }}</p>
                        </div>
                        <div>
                            <p class="text-stone-400 text-xs">Total</p>
                            <p class="font-bold text-orange-400 mt-0.5">Rp {{ number_format($order->total, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <h3 class="font-bold text-stone-900 mb-5">Status Pesanan</h3>
                <div class="space-y-5">
                    @php
                        $steps = [
                            'pending' => ['label' => 'Pesanan Diterima', 'desc' => 'Pesanan Anda sudah masuk'],
                            'confirmed' => ['label' => 'Dikonfirmasi', 'desc' => 'Pesanan sedang diverifikasi'],
                            'processing' => ['label' => 'Sedang Diproses', 'desc' => 'Sedang dimasak oleh kami'],
                            'ready' => ['label' => 'Siap Diambil', 'desc' => 'Pesanan siap diambil/diantar'],
                            'completed' => ['label' => 'Selesai', 'desc' => 'Terima kasih!'],
                        ];
                        $currentIndex = array_search($order->status, array_keys($steps));
                        if ($order->status === 'cancelled') $currentIndex = -1;
                    @endphp

                    @foreach($steps as $key => $step)
                        @php
                            $stepIndex = array_search($key, array_keys($steps));
                            $isActive = $stepIndex <= $currentIndex && $currentIndex >= 0;
                            $isCurrent = $stepIndex === $currentIndex && $currentIndex >= 0;
                        @endphp
                        <div class="flex items-center gap-5">
                            <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-2xl transition-all
                                {{ $isActive ? 'bg-stone-900 text-white shadow-lg shadow-orange-500/40' : 'bg-stone-100 text-stone-400' }}">
                                @if($stepIndex < $currentIndex)
                                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                                @elseif($isCurrent)
                                    <span class="h-3.5 w-3.5 rounded-full bg-orange-500 animate-pulse"></span>
                                @else
                                    <span class="h-2 w-2 rounded-full bg-stone-300"></span>
                                @endif
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-semibold {{ $isActive ? 'text-stone-900' : 'text-stone-400' }}">{{ $step['label'] }}</p>
                                <p class="text-xs {{ $isActive ? 'text-stone-500' : 'text-stone-300' }}">{{ $step['desc'] }}</p>
                            </div>
                            @if($isCurrent)
                                <span class="inline-flex items-center rounded-full bg-orange-100 px-2.5 py-1 text-[10px] font-bold text-orange-700">SEKARANG</span>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>

            <div>
                <h3 class="font-bold text-stone-900 mb-4">Detail Pesanan</h3>
                <div class="rounded-2xl border border-stone-200 divide-y divide-stone-100">
                    @foreach($order->items as $item)
                        <div class="flex justify-between p-5 text-sm">
                            <div>
                                <p class="font-semibold text-stone-900">{{ $item->menu_name }}</p>
                                <p class="text-stone-500 text-xs mt-0.5">x{{ $item->quantity }} @ Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                                @if($item->notes)
                                    <p class="text-stone-400 text-xs italic mt-0.5">{{ $item->notes }}</p>
                                @endif
                            </div>
                            <p class="font-bold text-stone-900">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
</div>
