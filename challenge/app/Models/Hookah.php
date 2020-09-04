<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @SWG\Definition(
 *  definition="Hookah",
 *  @SWG\Property(
 *      property="id",
 *      type="integer"
 *  ),
 *  @SWG\Property(
 *      property="name",
 *      type="string",
 *     example="Turk hookah",
 *  ),
 *  @SWG\Property(
 *      property="pipe",
 *      type="integer",
 *     example="4",
 *  ),
 *     @SWG\Property(
 *      property="price",
 *      type="integer",
 *     example="20",
 *  )
 * )
 */
class Hookah extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'pipe', 'price'];

    public function relation(): HasOne
    {
        return $this->hasOne('App\Models\HookahRelation');
    }

    public function reservation(): HasMany
    {
        $this->hasMany('App\Models\Reservation');
    }
}
