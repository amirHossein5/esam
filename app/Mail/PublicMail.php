<?php

namespace App\Mail;

use App\Models\Notify\Email;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PublicMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(public $subject, public string $body, public $files)
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $build = $this->subject($this->subject);

        foreach ($this->files as $file) {
            $build->attachFromStorage($file->file_path);
        }

        return $build->markdown('mail.public-mail');
    }
}
