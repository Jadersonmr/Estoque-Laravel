<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductOutput extends Model
{
    use SoftDeletes;

    protected $table = 'movimentations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'quantity', 'type','product_id', 'user_id', 'consolidation_id'
    ];
}
