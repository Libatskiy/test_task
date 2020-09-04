<?php

namespace App\Repositories;

use App\Models\Hookah;
use DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;
use App\Repositories\Contracts\HookahRepositoryInterface;

class HookahRepository implements HookahRepositoryInterface
{
    public function getAll($offset = 0,  $limit = 100): Collection
    {
        return Hookah::on()
            ->offset($offset)->limit($limit)->get();
    }

    public function findById($id): ?Hookah
    {
        return Hookah::find($id);
    }

    public function findFree($bar,  $timeFrom,  $timeTo,  $people): Collection
    {
        $needPipe = Str::pipes($people);
        $timeNeedFrom = $timeFrom - 60 * 30;
        $timeNeedTo = $timeFrom + 60 * 30;

        return Hookah::wherePipe($needPipe)
            ->whereNotIn('id', function ($query) use ($timeNeedFrom,$timeNeedTo) {
                $query->from('reservations')->select('hookah_id')
                    ->whereBetween('time_from', [$timeNeedFrom, $timeNeedTo]);

            })
            ->whereIn('id', function($query) use ($bar) {
                $query->from('hookah_relations')->select('hookah_id')
                    ->where('hookah_bar_id', $bar);
        })->get();
    }
}
