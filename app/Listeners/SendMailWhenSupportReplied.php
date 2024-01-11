<?php

namespace App\Listeners;

use App\Events\NewReplySupport;
use App\Mail\NewReplySupportMail;
use Illuminate\Support\Facades\Mail;

class SendMailWhenSupportReplied
{
    /**
     * Create the event listener.
     */
    public function __construct() {}

    /**
     * Handle the event.
     */
    public function handle(NewReplySupport $event): void
    {
        $support = $event->getSupport();
        Mail::to($support->user['email'])->send(new NewReplySupportMail($support));
    }
}
