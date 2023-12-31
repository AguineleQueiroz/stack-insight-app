<?php

namespace App\Repositories\Contracts;

interface PaginateInterface
{
    /**
     * @return array Array de stdClass
     */
    public function getItems():array;

    /**
     * @return int
     */
    public function total(): int;

    /**
     * @return bool
     */
    public function isFirstPage(): bool;

    /**
     * @return bool
     */
    public function isLastPage(): bool;

    /**
     * @return int - number of the current page
     */
    public function currentPage(): int;

    /**
     * @return int - number of the next page
     */
    public function getNextPage(): int;

    /**
     * @return int - number of the previous page
     */
    public function getPreviousPage(): int;
}
