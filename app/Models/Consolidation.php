<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Consolidation extends Model
{
    use SoftDeletes;

    protected $table = 'consolidations';

    protected $fillable = [
        'quantity', 'product_id'
    ];

    public function movimentation(): HasMany
    {
        return $this->hasMany(Movimentation::class);
    }

    public function product(): HasOne
    {
        return $this->hasOne(Product::class);
    }
}
