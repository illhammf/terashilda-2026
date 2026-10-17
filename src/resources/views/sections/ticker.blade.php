@php
    $sparkle = '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 0c.8 6.5 4.7 10.4 12 12-7.3 1.6-11.2 5.5-12 12-.8-6.5-4.7-10.4-12-12C7.3 10.4 11.2 6.5 12 0z"/></svg>';
    $items = ['Mie Jebew Mentai', 'Kwetiaw', 'Burger', 'Pangsit Goreng', 'Harga Mahasiswa', 'Fresh Tiap Hari', 'Pesan Online'];
@endphp

<div class="marquee {{ !empty($dark) ? 'marquee-dark' : '' }}" aria-hidden="true">
    <div class="marquee-track">
        @for($copy = 0; $copy < 2; $copy++)
            @foreach($items as $item)
                <span class="marquee-item">{!! $sparkle !!} {{ $item }}</span>
            @endforeach
        @endfor
    </div>
</div>
