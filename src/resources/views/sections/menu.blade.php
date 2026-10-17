@php
    $categories = \App\Models\Category::where('is_active', true)->orderBy('sort_order')->get();
    $menuItems = \App\Models\MenuItem::with('category')->available()->orderBy('sort_order')->get();
@endphp

<section id="menu" class="py-24 bg-white relative overflow-hidden">
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-0 left-1/4 w-[50%] h-[30%] rounded-full bg-orange-100 blur-[100px]"></div>
        <div class="absolute bottom-0 right-1/4 w-[50%] h-[30%] rounded-full bg-orange-100 blur-[100px]"></div>
    </div>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 reveal-on-scroll">
            <div class="inline-flex items-center gap-2 rounded-full bg-orange-100 px-4 py-1.5 text-xs font-bold text-orange-700 mb-4">
                MENU KAMI
            </div>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-stone-900">Pilih Favoritmu</h2>
            <p class="mt-3 text-stone-500 max-w-lg mx-auto">Dari Mie Jebew Mentai hingga pangsit goreng renyah — semua dibuat fresh setiap hari</p>
        </div>

        <div class="flex gap-2.5 overflow-x-auto pb-4 mb-12 scrollbar-hide" id="category-filters">
            <button class="category-pill pill-active flex-shrink-0 rounded-2xl px-6 py-2.5 text-sm font-bold bg-stone-900 text-white shadow-xl shadow-orange-200/40" data-category="all">
                Semua
            </button>
            @foreach($categories as $category)
                <button class="category-pill flex-shrink-0 rounded-2xl px-6 py-2.5 text-sm font-bold bg-white border border-orange-100 text-stone-600 hover:bg-orange-50 hover:text-orange-700 hover:border-orange-300 transition-all shadow-sm hover:shadow-md" data-category="{{ $category->slug }}">
                    {{ $category->name }}
                </button>
            @endforeach
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6" id="menu-grid">
            @foreach($menuItems as $item)
                <div class="menu-card-hover group bg-white rounded-3xl border border-stone-100/80 overflow-hidden hover:border-orange-300 hover:shadow-xl shadow-lg shadow-stone-100/60" data-category="{{ $item->category->slug }}">
                    <div class="relative h-48 bg-gradient-to-br from-orange-50 to-stone-50 flex items-center justify-center overflow-hidden group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-tr from-orange-400/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="relative z-10">
                            <div class="h-24 w-24 rounded-2xl bg-white shadow-xl shadow-stone-200/80 flex items-center justify-center group-hover:scale-110 transition-transform duration-500 border-4 border-orange-100">
                                <svg class="h-12 w-12 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                                    @if($item->category->slug === 'mie-jebew')
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/>
                                    @elseif($item->category->slug === 'kwetiaw')
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 12h18M3 6h18M3 18h18"/>
                                    @elseif($item->category->slug === 'burger')
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    @elseif($item->category->slug === 'pangsit')
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                    @elseif($item->category->slug === 'minuman')
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 002-2v10a2 2 0 002 2z"/>
                                    @else
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                    @endif
                                </svg>
                            </div>
                        </div>
                        @if($item->is_featured)
                            <span class="absolute top-4 left-4 rounded-lg bg-stone-900 px-3 py-1 text-[11px] font-bold text-white tracking-wide shadow-xl">UNGGULAN</span>
                        @endif
                        @if($item->discount_percent)
                            <span class="absolute top-4 right-4 rounded-lg bg-red-500 px-3 py-1 text-[11px] font-bold text-white tracking-wide shadow-xl">-{{ $item->discount_percent }}%</span>
                        @endif
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-stone-900 text-sm leading-snug group-hover:text-orange-600 transition-colors mb-2">{{ $item->name }}</h3>
                        <p class="text-xs text-stone-500 leading-relaxed line-clamp-2">{{ $item->description }}</p>
                        <div class="mt-5 flex items-center justify-between">
                            <div>
                                @if($item->discount_price)
                                    <p class="text-xs text-stone-400 line-through mb-0.5">Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                                    <p class="text-lg font-extrabold text-orange-600">Rp {{ number_format($item->final_price, 0, ',', '.') }}</p>
                                @else
                                    <p class="text-lg font-extrabold text-orange-600">Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                                @endif
                            </div>
                            <button wire:click="add({{ $item->id }})" class="inline-flex items-center gap-2 rounded-xl bg-stone-900 px-4 py-3 text-xs font-bold text-white hover:bg-orange-600 transition-all shadow-lg shadow-orange-200 active:scale-95">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                Tambah
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@push('scripts')
<script>
    document.querySelectorAll('.category-pill').forEach(button => {
        button.addEventListener('click', () => {
            document.querySelectorAll('.category-pill').forEach(b => {
                b.classList.remove('pill-active');
                b.classList.remove('bg-stone-900', 'text-white', 'shadow-xl', 'shadow-orange-200/40');
                b.classList.add('bg-white', 'border', 'border-orange-100', 'text-stone-600');
            });
            button.classList.add('pill-active');
            button.classList.remove('bg-white', 'border', 'border-orange-100', 'text-stone-600');
            const category = button.dataset.category;
            document.querySelectorAll('#menu-grid .menu-card-hover').forEach(card => {
                if (category === 'all' || card.dataset.category === category) {
                    card.style.display = '';
                    card.style.opacity = '0';
                    setTimeout(() => card.style.opacity = '1', 50);
                } else {
                    card.style.opacity = '0';
                    setTimeout(() => card.style.display = 'none', 300);
                }
            });
        });
    });
</script>
@endpush
