<?php

namespace App\DTO;

use App\Http\Requests\StoreUpdateSupport;

class UpdateSupportDTO
{
    /**
     * @param string $int
     * @param string $subject
     * @param string $content
     * @param string $status
     */
    public function  __construct(
        public string $int,
        public string $subject,
        public string $content,
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
            $request->content,
            'active'/*$request->status*/
        );
    }
}
