<?php

namespace App\Repositories;
use App\Http\Controllers\Admin\ReplySupportController;
use App\Models\ReplySupport;
use App\Repositories\Contracts\PaginateInterface;
use App\Repositories\Contracts\ReplyRepositoryInterface;
use App\Repositories\Eloquent\ReplySupportRepository;
use App\Services\ReplySupportService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;
use stdClass;

class PaginationPresenter implements PaginateInterface
{
    /**
     * @var stdClass[]
     */
    private array $items;
    public function __construct( protected LengthAwarePaginator $paginator){
        $this->items = $this->resolveDataItems($this->paginator->items());
    }

    /**
     * @return array - Array de stdClass
     */
    public function getItems(): array
    {
        $supports = $this->items;
        foreach ($supports as &$support) {
            $reply_model = new ReplySupport();
            $support->content_body = Str::limit($support->content_body, 38, '...');
            $support = (array)$support;
            $support['total_replies'] = (new ReplySupportRepository($reply_model))->getRepliesBySupport($support['id']);
            $support = (object)$support;
        }
        return $supports;
    }

    /**
     * @return int
     */
    public function total(): int
    {
        return $this->paginator->total() ?? 0;
    }

    /**
     * @return bool
     */
    public function isFirstPage(): bool
    {
        return $this->paginator->onFirstPage();
    }

    /**
     * @return bool
     */
    public function isLastPage(): bool
    {
        return $this->paginator->currentPage() === $this->paginator->lastPage();
    }

    /**
     * @return int - number of the current page
     */
    public function currentPage(): int
    {
        return $this->paginator->currentPage() ?? 1;
    }

    /**
     * @return int - number of the next page
     */
    public function getNextPage(): int
    {
        return $this->paginator->currentPage() + 1;
    }

    /**
     * @return int - number of the previous page
     */
    public function getPreviousPage(): int
    {
        return $this->paginator->currentPage() - 1;
    }

    private function resolveDataItems(array $listItems): array
    {
        $data = [];
        foreach ($listItems as $item) {
            $stdClassObject = new stdClass;
            foreach ($item->toArray() as $key => $value) {
                $stdClassObject->{$key} = $value;
            }
            $data[] = $stdClassObject;
        }
        return $data;
    }
}
