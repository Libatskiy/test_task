<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *  @SWG\Definition(
 *  definition="Reservation",
 *  @SWG\Property(
 *      property="id",
 *      type="integer",
 *  ),
 *  @SWG\Property(
 *      property="name",
 *      type="integer",
 *     example = "Vasiliy",
 *     description = "name person",
 *     uniqueItems = true,
 *  ),
 *  @SWG\Property(
 *      property="number_people",
 *      type="integer",
 *     example = "4",
 *     description = "number people",
 *  ),
 *  @SWG\Property(
 *      property="hookah_id",
 *      type="integer",
 *     example = "10",
 *     description = "Hookah ID",
 *  ),
 *  @SWG\Property(
 *      property="time_from",
 *      type="integer",
 *     example = "123456789",
 *     description = "Time from reservation",
 *  ),
 *  @SWG\Property(
 *      property="time_to",
 *      type="dateTime",
 *     example = "123456889",
 *     description = "Time to reservation",
 *  )
 * )
 */
class Reservation extends Model
{
    const STATUS_ACTIVE = 1;
    const STATUS_NOT_ACTIVE = 2;
    const STATUS_WAITING = 3;

    public $timestamps = false;
    protected $guarded = [];

    public function hookah(): BelongsTo
    {
        return $this->belongsTo('App\Models\Hookah');
    }

    public static function boot(): void
    {
        parent::boot();
        self::creating(function ($model) {
            $timeFrom = Carbon::parse($model->time_from);
            $model->time_to = $timeFrom->addMinutes(30);
        });
    }
}
