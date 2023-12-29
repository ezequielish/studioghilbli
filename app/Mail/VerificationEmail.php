<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class VerificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $theme = 'custom'; // custom.css
    /**
     * Create a new message instance.
     */
    // public function __construct(object $sender, array $content, String $view)
    // {
    //     $this->content = $content;
    //     $this->subject = $subject;
    //     $this->view = $view;
    //     $this->sender = $sender;
    // }

    public function __construct(
        public array $data = [],
    ) {}
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Verification Email Studio Ghibli',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        // var_dump($this->data['name']);
        return new Content(
            view: 'email',
            with: [
                'logo' => Storage::disk('public')->url('logo.png'),
                "name" => isset($this->data['name']) ? $this->data['name'] : "",
                "verification_url" => isset($this->data['verification_url']) ? $this->data['verification_url'] : "",
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
