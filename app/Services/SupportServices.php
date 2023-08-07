<?php

namespace App\Services;

use App\DTO\{ CreateSupportDTO, UpdateSupportDTO };
use App\Repositories\SupportRepositoryInterface;
use stdClass;
class SupportServices
{
    protected SupportRepositoryInterface $repository;

    public function __constructor(
        SupportRepositoryInterface $repository,
    ) {
        $this->repository = $repository;
    }

    /**
     * @param CreateSupportDTO $dto
     * @return stdClass
     */
    public function new(CreateSupportDTO $dto): stdClass {
        return  $this->repository->new($dto);
    }

    /**
     * @param string|null $filter
     * @return array
     */
    public function getAll(string $filter = null ): array {
        return $this->repository->getAll($filter);
    }

    /**
     * @param string|int $id
     * @return stdClass|null
     */
    public function findOne(string | int $id): stdClass | null
    {
        return $this->repository->findOne($id);
    }

    /**
     * @param UpdateSupportDTO $dto
     * @return stdClass|null
     */
    public function update(UpdateSupportDTO $dto): stdClass | null {
        return  $this->repository->update($dto);
    }
    /**
     * @param string|int $id
     * @return void
     */
    public function delete(string | int $id): void {
        $this->repository->delete($id);
    }
}
