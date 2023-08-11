<?php

namespace App\DTO;

use App\Http\Requests\StoreUpdateSupport;

class UpdateSupportDTO
{
    /**
     * @param string $id
     * @param string $subject
     * @param string $content_body
     * @param string $status
     */
    public function  __construct(
        public string $id,
        public string $subject,
        public string $content_body,
        public string $status
    ){}

    /**
     * @param StoreUpdateSupport $request
     * @return self
     */
    public static function makeFromRequest(StoreUpdateSupport $request): self {
        return new self(
            $request->id,
            $request->subject,
            $request->content_body,
            'active'/*$request->status*/
        );
    }
}
