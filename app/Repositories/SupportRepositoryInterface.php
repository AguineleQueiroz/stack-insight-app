<?php

namespace App\Repositories;
use App\DTO\{ CreateSupportDTO, UpdateSupportDTO };
use stdClass;

interface SupportRepositoryInterface
{
    /**
     * @param string|null $filter
     * @return array
     */
    public function getAll(string $filter = null): array;

    /**
     * @param string|int $id
     * @return stdClass|null
     */
    public function findOne(string | int $id): stdClass | null;

    /**
     * @param CreateSupportDTO $dto
     * @return stdClass
     */
    public function new(CreateSupportDTO $dto): stdClass;

    /**
     * @param UpdateSupportDTO $dto
     * @return stdClass|null
     */
    public function update(UpdateSupportDTO $dto): stdClass | null;
    /**
     * @param string|int $id
     * @return void
     */public function delete(string | int $id): void;
}
