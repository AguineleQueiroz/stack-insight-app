<?php

namespace App\DTO\Supports;

use App\Http\Requests\StoreUpdateSupport;
use App\Services\Enums\SupportStatus;

class CreateSupportDTO
{
    /**
     * @param string $subject
     * @param string $content_body
     * @param SupportStatus $status
     */
    public function  __construct(
        public string $subject,
        public string $content_body,
        public SupportStatus $status
    ){}

    /**
     * @param StoreUpdateSupport $request
     * @return self
     */
    public static function makeFromRequest(StoreUpdateSupport $request): self {
        return new self(
            $request['subject'],
            $request['content_body'],
            SupportStatus::Active,
        );
    }
}
