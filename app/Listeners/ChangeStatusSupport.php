<?php

namespace App\Listeners;

use App\Events\NewReplySupport;
use App\Services\Enums\SupportStatus;
use App\Services\SupportServices;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ChangeStatusSupport
{
    /**
     * Create the event listener.
     */
    public function __construct( protected SupportServices $support_services)
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(NewReplySupport $event): void
    {
        $reply = $event->getReply();
        $this->support_services->updateStatus(
            id: $reply->support_id,
            status: SupportStatus::Pendent
        );
    }
}
