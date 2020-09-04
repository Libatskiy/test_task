<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface ReservationRepositoryInterface
{
    public function getAllActive(int $offset, int $limit): Collection;

    public function getActiveForBar(int $barId): Collection;
}
