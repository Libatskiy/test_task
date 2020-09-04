<?php

namespace App\Repositories;

use App\Models\Reservation;
use App\Repositories\Contracts\ReservationRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ReservationRepository implements ReservationRepositoryInterface
{
    public function getAllActive(int $offset = 0, int $limit = 100): Collection
    {
        return Reservation::where('status', Reservation::STATUS_ACTIVE )
            ->offset($offset)->limit($limit)->with('hookah')->get();
    }

    public function getActiveForBar(int $barId): Collection
    {
        return Reservation::where('status', Reservation::STATUS_ACTIVE )
            ->join('hookah_relations', function($join) use ($barId) {
                $join->on('reservations.hookah_id', '=', 'hookah_relations.hookah_id')
                    ->where('hookah_relations.hookah_bar_id', $barId);
            })
            ->with('hookah')->get();
    }
}
