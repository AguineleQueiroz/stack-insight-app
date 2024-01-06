<?php

namespace App\Services;

use Illuminate\Support\Facades\Gate;
use App\DTO\{Supports\CreateSupportDTO, Supports\UpdateSupportDTO};
use App\Repositories\Contracts\PaginateInterface;
use App\Repositories\Contracts\SupportRepositoryInterface;
use stdClass;

class SupportServices
{
    public function __construct(
        protected SupportRepositoryInterface $repository
    ){}

    /**
     * @param int $page
     * @param int $totalPerPage
     * @param string|null $filter
     * @return PaginateInterface
     */
    public function paginate(int $page = 1, int $totalPerPage = 15, string $filter = null): PaginateInterface {
        return $this->repository->paginate(
            page: $page,
            totalPerPage: $totalPerPage,
            filter: $filter,
        );
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
     * @param string $id
     * @return void
     */
    public function delete(string $id): void {
        $this->repository->delete($id);
    }
}
