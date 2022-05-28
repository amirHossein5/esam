<?php

namespace App\Mail;

use App\Models\Market\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AuctionSuggestionSubmittedMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(public Product $product, public string $suggested_amount)
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
        return $this->subject('پیشنهاد جدیدی برای مزایده ثبت شد.')
            ->markdown('mail.auction-suggestion-submitted-mail');
    }
}
