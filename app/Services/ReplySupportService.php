<?php

namespace App\Services;

use App\DTO\Replies\CreateReplyDTO;
use App\Repositories\Contracts\ReplyRepositoryInterface;
use Exception;
use stdClass;

class ReplySupportService
{
    public function __construct( protected ReplyRepositoryInterface $repository ){}
    /**
     * @param string $supportId
     * @return array
     */
    public function getRepliesBySupport(string $supportId):array {
        return $this->repository->getRepliesBySupport($supportId);
    }

    /**
     * @throws Exception
     */
    public function create(CreateReplyDTO $dto):stdClass {
        return $this->repository->create($dto);
    }
}
