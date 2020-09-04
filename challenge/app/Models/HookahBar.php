<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * * @SWG\Definition(
 *  definition="HookahBar",
 *  @SWG\Property(
 *      property="id",
 *      type="integer",
 *      example = "3",
 *  ),
 *  @SWG\Property(
 *      property="name",
 *      type="string",
 *     example = "Best Bar",
 *  ),
 * )
 */
class HookahBar extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];

    public function reservation(): HasMany
    {
        return $this->hasMany('App\Models\Reservation');
    }
}

