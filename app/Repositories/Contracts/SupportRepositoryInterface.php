<?php

namespace App\Repositories\Contracts;
use App\Services\Enums\SupportStatus;
use App\DTO\{Supports\CreateSupportDTO, Supports\UpdateSupportDTO};
use stdClass;

interface SupportRepositoryInterface
{

    /**
     * @param int $page
     * @param int $totalPerPage
     * @param string|null $filter
     * @return PaginateInterface
     */
    public function paginate(int $page = 1, int $totalPerPage = 15, string $filter = null): PaginateInterface;


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
     * @param string $id
     * @param SupportStatus $status
     * @return void
     */
    public function updateStatus(string $id, SupportStatus $status): void;

    /**
     * @param string|int $id
     * @return void
     */public function delete(string | int $id): void;
}
