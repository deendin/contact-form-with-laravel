<?php

namespace App\Listeners;

use App\Events\ContactCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\SendContactCreatedMail;
use Illuminate\Support\Facades\Mail;

class SendContactInfoToAdmin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\ContactCreated  $event
     * @return void
     */
    public function handle(ContactCreated $event)
    {
        $contact = $event->contact;
        
        Mail::to(config('constants.admin_email'))
            ->queue(
                new SendContactCreatedMail($contact)
            );
        
    }
}
