<?php

namespace App\Services;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use stdClass as stdClassAlias;
/*
 * **************************************************************************
 * Service layer pattern implementation
 * **************************************************************************
 */
class SupportServices
{
    protected $repository;

    /**
     * @return void
     */
    public function __constructor() {

    }

    /**
     * @param CreateSupportDTO $dto
     * @return stdClassAlias
     */
    public function new(CreateSupportDTO $dto): stdClassAlias {
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
     * @return stdClassAlias|null
     */
    public function findOne(string | int $id): stdClassAlias | null
    {
        return $this->repository->findOne($id);
    }

    /**
     * @param UpdateSupportDTO $dto
     * @return stdClassAlias|null
     */
    public function update(UpdateSupportDTO $dto): stdClassAlias | null {
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
