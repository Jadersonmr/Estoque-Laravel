<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movimentation extends Model
{
    use SoftDeletes;

    protected $table = 'movimentations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'quantity', 'type', 'product_id', 'user_id', 'consolidation_id'
    ];

    public function consolidation(): BelongsTo
    {
        return $this->belongsTo(Consolidation::class);
    }
}
