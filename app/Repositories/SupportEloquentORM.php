<?php

use App\DTO\{ CreateSupportDTO, UpdateSupportDTO };
use stdClass;
class SupportEloquentORM implements \App\Repositories\SupportRepositoryInterface
{

    public function getAll(string $filter = null): array
    {
        // TODO: Implement getAll() method.
    }

    public function findOne(int|string $id): stdClass|null
    {
        // TODO: Implement findOne() method.
    }

    public function new(CreateSupportDTO $dto): stdClass
    {
        // TODO: Implement new() method.
    }

    public function update(UpdateSupportDTO $dto): stdClass|null
    {
        // TODO: Implement update() method.
    }

    public function delete(int|string $id): void
    {
        // TODO: Implement delete() method.
    }
}
