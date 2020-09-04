<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * * @SWG\Definition(
 *  definition="HookahRelation",
 *  @SWG\Property(
 *      property="id",
 *      type="integer",
 *  ),
 *  @SWG\Property(
 *      property="hookah_id",
 *      type="integer",
 *     example = "10",
 *     description = "Hookah ID",
 *  ),
 *  @SWG\Property(
 *      property="hookah_bar_id",
 *      type="integer",
 *     example = "1",
 *     description = "Hookah bar ID",
 *  )
 * )
 */
class HookahRelation extends Model
{
    protected $fillable = ['hookah_id', 'hookah_bar_id'];
    public $timestamps = false;

    public function bar(): BelongsTo
    {
        return $this->belongsTo('App\Models\Hookah_bar');
    }

    public function hookah(): BelongsTo
    {
        return $this->belongsTo('App\Models\Hookah');
    }
}
