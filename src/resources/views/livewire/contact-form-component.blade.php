<div>
    <form wire:submit="submitContact" class="space-y-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                <input type="text" wire:model="contact_name" class="w-full rounded-lg border-0 px-3 py-2.5 text-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-orange-500" placeholder="Nama Anda">
                @error('contact_name') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" wire:model="contact_email" class="w-full rounded-lg border-0 px-3 py-2.5 text-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-orange-500" placeholder="email@contoh.com">
                @error('contact_email') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
            </div>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Subjek</label>
            <input type="text" wire:model="contact_subject" class="w-full rounded-lg border-0 px-3 py-2.5 text-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-orange-500" placeholder="Subjek pesan">
            @error('contact_subject') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Pesan</label>
            <textarea wire:model="contact_message" rows="4" class="w-full rounded-lg border-0 px-3 py-2.5 text-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-orange-500" placeholder="Tulis pesan Anda..."></textarea>
            @error('contact_message') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
        </div>
        <button type="submit" class="w-full rounded-xl bg-orange-600 py-3 text-sm font-bold text-white hover:bg-orange-700 transition-colors shadow-lg shadow-orange-200">
            Kirim Pesan
        </button>
    </form>
</div>
