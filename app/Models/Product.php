<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'price', 'image'
    ];

    public function search($filter = null)
    {
        return $this->where(function ($query) use($filter) {
            if ($filter) {
                $query->where('name', 'LIKE', "%{$filter}%");
            }
        })->paginate(20);
    }

    public function stock(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(ProductStock::class);
    }
}
