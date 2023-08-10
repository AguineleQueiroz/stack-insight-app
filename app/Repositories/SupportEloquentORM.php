<?php

namespace App\Repositories;

use App\Models\Support;
use App\DTO\{ CreateSupportDTO, UpdateSupportDTO };
use \App\Repositories\SupportRepositoryInterface;
use stdClass;
class SupportEloquentORM implements SupportRepositoryInterface
{
    public function __construct(protected Support $modelSupport){}

    /**
     * @param string|null $filter
     * @return array
     */
    public function getAll(string $filter = null): array
    {
        return $this->modelSupport->where(function ($query) use ($filter) {
            if ($filter) {
                $query->where('subject', $filter);
                $query->orWhere('content', 'like', "%{$filter}%");
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
    {   $supportDataArray = (array) $dto;
        $support = $this->modelSupport->find($dto->id);
        if (!$support){
            return null;
        }
        return ($support->update($supportDataArray))->toArray();
    }

    /**
     * @param int|string $id
     * @return void
     */
    public function delete(int|string $id): void
    {
        $this->modelSupport->findOrFail($dto)->delete();
    }
}
