<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class AccessKeyMail extends Mailable
{
    use Queueable, SerializesModels;
    public $employeeName;
    public $generatedPassword;

    /**
     * Create a new message instance.
     */
    public function __construct(public string $Name, public string $Password)
    {
        $this->employeeName = $Name;
        $this->generatedPassword = $Password;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Welcome to the MotorVitaGlobal!', // Consistent subject
        );
    }

    /**
     * Get the message content definition.
     */
    // public function content(): Content // Removed the content() method
    // {
    //     return new Content(
    //         view: 'emails.accesspassword',
    //     );
    // }

    public function build()
    {
        $hrEmail = Auth::user()->email; // Assuming the authenticated user is the HR
        $hrName = Auth::user()->name;   // Assuming the authenticated user has a name

        return $this->from($hrEmail, $hrName)
                    ->markdown('emails.accesspassword') // Assuming accesspassword.blade.php is in resources/views/emails
                    ->with(['employeeName' => $this->employeeName, 'generatedPassword' => $this->generatedPassword]);
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