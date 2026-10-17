<div>
    <form wire:submit="submitContact">
        <div class="form-grid-2" style="margin-bottom:16px">
            <div>
                <label class="label">Nama</label>
                <input type="text" wire:model="contact_name" class="input" placeholder="Nama kamu">
                @error('contact_name') <p class="field-error">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="label">Email</label>
                <input type="email" wire:model="contact_email" class="input" placeholder="email@contoh.com">
                @error('contact_email') <p class="field-error">{{ $message }}</p> @enderror
            </div>
        </div>
        <div style="margin-bottom:16px">
            <label class="label">Subjek</label>
            <input type="text" wire:model="contact_subject" class="input" placeholder="Mau tanya apa?">
            @error('contact_subject') <p class="field-error">{{ $message }}</p> @enderror
        </div>
        <div style="margin-bottom:22px">
            <label class="label">Pesan</label>
            <textarea wire:model="contact_message" rows="4" class="input" style="resize:none" placeholder="Tulis pesanmu di sini..."></textarea>
            @error('contact_message') <p class="field-error">{{ $message }}</p> @enderror
        </div>
        <button type="submit" class="btn btn-kunyit btn-lg btn-block" data-burst>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 2 11 13"></path><path d="M22 2 15 22l-4-9-9-4Z"></path></svg>
            Kirim Pesan
        </button>
    </form>
</div>
