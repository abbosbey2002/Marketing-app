<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ProviderInvitation extends Mailable
{
    use Queueable, SerializesModels;

    public $invitationLink;

    public $provider;

    public $email;

    /**
     * Create a new message instance.
     */
    public function __construct($invitationLink, $provider, $email)
    {
        $this->invitationLink = $invitationLink;
        $this->provider = $provider;
        $this->email = $email;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Providerga qo\'shilish taklifi',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.provider_invitation',
            with: [
                'invitationLink' => $this->invitationLink,
                'provider' => $this->provider,
                'email' => $this->email,
            ],
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
