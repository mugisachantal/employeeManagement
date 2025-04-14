<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CVUploaded extends Mailable
{
    use Queueable, SerializesModels;

    public $cvPath;

    public function __construct($cvPath)
    {
        $this->cvPath = $cvPath; // Store the CV path
    }

    public function build()
    {
        return $this->subject('New CV Uploaded') // Set the email subject
                    ->view('cv_uploaded') // Use the email view directly under views
                    ->attach(storage_path('app/public/' . $this->cvPath), [
                        'as' => 'CV.pdf', // Name of the attachment
                        'mime' => 'application/pdf', // MIME type
                    ]);
    }
}