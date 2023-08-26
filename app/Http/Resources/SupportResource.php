<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SupportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'subject' => $this->subject,
            'content_body' => $this->content_body,
            'status' => $this->status,
            'createdAt' => Carbon::make($this->created_at)->format('Y-m-d\TH:i:s'),
        ];
    }
}
