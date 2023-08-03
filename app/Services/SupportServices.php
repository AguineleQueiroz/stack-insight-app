<?php

namespace App\Services;

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
     * @param string $subject
     * @param string $content
     * @param string $status
     * @return stdClassAlias
     */
    public function new(string $subject, string $content, string $status): stdClassAlias {
        return  $this->repository->new(
            $subject, $content, $status
        );
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
     * @param string|int $id
     * @param string $subject
     * @param string $content
     * @param string $status
     * @return stdClassAlias|null
     */
    public function update(string | int $id, string $subject, string $content, string $status): stdClassAlias | null {
        return  $this->repository->update(
            $id, $subject, $content, $status
        );
    }
    /**
     * @param string|int $id
     * @return void
     */
    public function delete(string | int $id): void {
        $this->repository->delete($id);
    }
}
