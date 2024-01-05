<?php

namespace App\Repositories\Contracts;

use App\DTO\Replies\CreateReplyDTO;
use stdClass;

interface ReplyRepositoryInterface
{
    /**
     * @param string $supportId
     * @return array
     */
    public function getRepliesBySupport(string $supportId):array;

    /**
     * @param CreateReplyDTO $dto
     * @return stdClass
     */
    public function create(CreateReplyDTO $dto): stdClass;

    /**
     * @param string $id
     * @return bool
     */
    public function delete(string $id): bool;
}

