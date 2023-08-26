<?php

namespace App\Adapters;

use App\Http\Resources\DefaultResource;
use App\Repositories\PaginateInterface;

class ApiAdapter
{
    public static function toJson(PaginateInterface $data) {
        return DefaultResource::collection($data->getItems())->additional([
            "meta" => [
                "total" => $data->total(),
                "is_first_page" => $data->isFirstPage(),
                "is_last_page" => $data->isLastPage(),
                "previous_page" => $data->getPreviousPage(),
                "current_page" => $data->currentPage(),
                "next_page" => $data->getNextPage(),
            ]
        ]);
    }
}
