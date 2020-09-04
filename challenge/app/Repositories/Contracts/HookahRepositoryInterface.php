<?php

namespace App\Repositories\Contracts;

use App\Models\Hookah;
use Illuminate\Database\Eloquent\Collection;

interface HookahRepositoryInterface
{
    public function getAll(int $offset, int $limit): Collection;

    public function findById(int $id): ?Hookah;

    public function findFree(int $bar,string $timeFrom, string $timeTo, int $people): Collection;
}
