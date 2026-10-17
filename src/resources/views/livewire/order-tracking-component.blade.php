<div class="bg-white rounded-2xl shadow-lg p-6">
    <h2 class="text-xl font-bold text-gray-900 mb-4">Lacak Pesanan</h2>

    <form wire:submit="track" class="flex gap-2 mb-6">
        <input type="text" wire:model="search" class="flex-1 rounded-lg border-0 px-3 py-2.5 text-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-orange-500" placeholder="Masukkan nomor pesanan (TH-20260101-XXXXX)">
        <button type="submit" class="rounded-lg bg-orange-600 px-5 py-2.5 text-sm font-bold text-white hover:bg-orange-700">Lacak</button>
    </form>

    @error('search') <p class="mb-4 text-sm text-red-500">{{ $message }}</p> @endError

    @if($notFound)
        <div class="text-center py-8">
            <div class="text-5xl mb-3">🔍</div>
            <p class="text-gray-500">Pesanan tidak ditemukan. Periksa kembali nomor pesanan Anda.</p>
        </div>
    @endif

    @if($order)
        <div class="space-y-4">
            <div class="rounded-xl bg-orange-50 p-4">
                <div class="flex justify-between items-start mb-3">
                    <div>
                        <p class="text-xs text-gray-500">Nomor Pesanan</p>
                        <p class="font-bold text-gray-900">{{ $order->order_number }}</p>
                    </div>
                    <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-medium
                        @if($order->status === 'pending') bg-yellow-100 text-yellow-800
                        @elseif($order->status === 'confirmed') bg-blue-100 text-blue-800
                        @elseif($order->status === 'processing') bg-indigo-100 text-indigo-800
                        @elseif($order->status === 'ready') bg-green-100 text-green-800
                        @elseif($order->status === 'completed') bg-green-100 text-green-800
                        @else bg-red-100 text-red-800
                        @endif">
                        {{ $order->status_label }}
                    </span>
                </div>

                <div class="grid grid-cols-2 gap-3 text-sm">
                    <div>
                        <p class="text-gray-500 text-xs">Nama</p>
                        <p class="font-medium">{{ $order->customer_name }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-xs">Pembayaran</p>
                        <p class="font-medium">{{ $order->payment_method_label ?? '-' }} - {{ $order->payment_status_label }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-xs">Pengambilan</p>
                        <p class="font-medium">{{ $order->pickup_type === 'pickup' ? 'Ambil Sendiri' : 'Diantar' }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-xs">Total</p>
                        <p class="font-bold text-orange-600">Rp {{ number_format($order->total, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            <div>
                <h3 class="font-semibold text-gray-900 mb-2">Status Pesanan</h3>
                <div class="space-y-3">
                    @php
                        $steps = [
                            'pending' => ['label' => 'Pesanan Diterima', 'icon' => '📋'],
                            'confirmed' => ['label' => 'Dikonfirmasi', 'icon' => '✅'],
                            'processing' => ['label' => 'Sedang Diproses', 'icon' => '👨‍🍳'],
                            'ready' => ['label' => 'Siap Diambil', 'icon' => '🎉'],
                            'completed' => ['label' => 'Selesai', 'icon' => '⭐'],
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
                        <div class="flex items-center gap-3">
                            <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full text-lg
                                {{ $isActive ? 'bg-orange-100' : 'bg-gray-100' }}">
                                {{ $step['icon'] }}
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-medium {{ $isActive ? 'text-gray-900' : 'text-gray-400' }}">{{ $step['label'] }}</p>
                            </div>
                            @if($isCurrent)
                                <span class="h-2.5 w-2.5 rounded-full bg-orange-500 animate-pulse"></span>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>

            <div>
                <h3 class="font-semibold text-gray-900 mb-2">Detail Pesanan</h3>
                <div class="rounded-xl border divide-y">
                    @foreach($order->items as $item)
                        <div class="flex justify-between p-3 text-sm">
                            <div>
                                <p class="font-medium">{{ $item->menu_name }}</p>
                                <p class="text-gray-500 text-xs">x{{ $item->quantity }} @ Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                                @if($item->notes)
                                    <p class="text-gray-400 text-xs italic">{{ $item->notes }}</p>
                                @endif
                            </div>
                            <p class="font-medium">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</p>
                        </div>
                    @endforeach>
                </div>
            </div>
        </div>
    @endif
</div>
