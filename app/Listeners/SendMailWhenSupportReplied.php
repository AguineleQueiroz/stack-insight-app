<?php

namespace App\Listeners;

use App\Events\NewReplySupport;
use App\Mail\NewReplySupportMail;
use App\Models\Support;
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
        $reply = $event->getReply();
        Mail::to($reply->owner_support_email['email'])->send(new NewReplySupportMail($reply));
    }
}
