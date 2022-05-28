<?php

namespace App\Listeners;

use App\Mail\AuctionSuggestionSubmittedMail;
use App\Models\AuctionSuggestion;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class AuctionSuggestionSubmittedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        foreach ($event->product->auction->followers as $follower) {
            Mail::to($follower)
                ->queue(new AuctionSuggestionSubmittedMail($event->product, $event->suggested_amount));
        }
    }
}
