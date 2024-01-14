<?php

namespace App\DTO\Replies;

use App\Http\Requests\StoreReplySupportRequest;

class CreateReplyDTO
{
    public function  __construct(
        public string $supportId,
        public string $content_reply,
    ){}

    public static function makeReplyFromRequest(StoreReplySupportRequest $request): self {

        return new self(
            $request->support_id,
            $request->content_reply
        );
    }
}
