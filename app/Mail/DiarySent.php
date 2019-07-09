<?php

namespace App\Mail;

use App\Diary;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DiarySent extends Mailable
{
    use Queueable, SerializesModels;

    public $diary;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Diary $diary)
    {
        $this->diary = $diary;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.remind.diary')
                    ->with([
                        'title' => $this->diary->title,
                        'body' => $this->diary->body,
                    ]);
    }
}
