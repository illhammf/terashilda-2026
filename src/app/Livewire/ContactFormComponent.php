<?php

namespace App\Livewire;

use App\Models\ContactMessage;
use Filament\Notifications\Notification;
use Livewire\Component;

class ContactFormComponent extends Component
{
    public string $contact_name = '';
    public string $contact_email = '';
    public string $contact_subject = '';
    public string $contact_message = '';

    protected $rules = [
        'contact_name' => 'required|string|max:255',
        'contact_email' => 'required|email|max:255',
        'contact_subject' => 'required|string|max:255',
        'contact_message' => 'required|string|max:2000',
    ];

    protected $messages = [
        'contact_name.required' => 'Nama wajib diisi',
        'contact_email.required' => 'Email wajib diisi',
        'contact_email.email' => 'Format email tidak valid',
        'contact_subject.required' => 'Subjek wajib diisi',
        'contact_message.required' => 'Pesan wajib diisi',
    ];

    public function submitContact(): void
    {
        $this->validate();

        ContactMessage::create([
            'name' => $this->contact_name,
            'email' => $this->contact_email,
            'subject' => $this->contact_subject,
            'message' => $this->contact_message,
        ]);

        Notification::make()
            ->success()
            ->title('Pesan Terkirim!')
            ->body('Terima kasih atas pesan Anda. Kami akan segera merespons.')
            ->send();

        $this->reset(['contact_name', 'contact_email', 'contact_subject', 'contact_message']);
    }

    public function render()
    {
        return view('livewire.contact-form-component');
    }
}
