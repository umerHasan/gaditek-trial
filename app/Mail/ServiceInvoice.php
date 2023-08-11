<?php

namespace App\Mail;

use App\Models\Service;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ServiceInvoice extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $service;
    /**
     * Create a new message instance.
     */
    public function __construct($userId, $serviceId)
    {
        $this->user = User::find($userId);
        $this->service = Service::find($serviceId);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Service Invoice',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.service_invoice',
            with: [
                'user' => $this->user,
                'service' => $this->service
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
