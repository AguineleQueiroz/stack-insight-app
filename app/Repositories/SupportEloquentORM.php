<?php

namespace App\Repositories;

use App\Models\Support;
use App\DTO\{ CreateSupportDTO, UpdateSupportDTO };
use \App\Repositories\SupportRepositoryInterface;
use stdClass;
class SupportEloquentORM implements SupportRepositoryInterface
{
    /**
     * @param Support $modelSupport
     */
    public function __construct(protected Support $modelSupport){}


    /**
     * @param int $page
     * @param int $totalPerPage
     * @param string|null $filter
     * @return PaginateInterface
     */
    public function paginate(int $page = 1, int $totalPerPage = 15, string $filter = null): PaginateInterface
    {
        $supportsPage =  $this->modelSupport->where(function ($query) use ($filter) {
            if ($filter) {
                $query->where('subject', $filter);
                $query->orWhere('content_body', 'like', "%{$filter}%");
            }
        })->paginate($totalPerPage, ['*'], 'page', $page);
    }


    /**
     * @param string|null $filter
     * @return array
     */
    public function getAll(string $filter = null): array
    {
        return $this->modelSupport->where(function ($query) use ($filter) {
            if ($filter) {
                $query->where('subject', $filter);
                $query->orWhere('content_body', 'like', "%{$filter}%");
            }
        })->get()->toArray();
    }


    /**
     * @param int|string $id
     * @return stdClass|null
     */
    public function findOne(int|string $id): stdClass|null
    {
        $support = $this->modelSupport->find($id);
        $data = $support ? (object) $support->toArray() : null;
        return $data;
    }


    /**
     * @param CreateSupportDTO $dto
     * @return stdClass
     */
    public function new(CreateSupportDTO $dto): stdClass
    {
        $supportDataArray = (array) $dto;
        $newSupport = $this->modelSupport->create($supportDataArray);
        /*transform in stdClass*/
        return (object)$newSupport->toArray();
    }


    /**
     * @param UpdateSupportDTO $dto
     * @return stdClass|null
     */
    public function update(UpdateSupportDTO $dto): stdClass|null
    {
        $support = $this->modelSupport->find($dto->id);
        if (!$support){
            return null;
        }
        $supportDataArray = (array) $dto;
        $support->update($supportDataArray);
        /* transform in stdClass and return */
        return (object)$support->toArray();
    }


    /**
     * @param int|string $id
     * @return void
     */
    public function delete(int|string $id): void
    {
        $this->modelSupport->findOrFail($id)->delete();
    }
}
