<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

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

    /**
     * @param string|null $filter
     * @return LengthAwarePaginator
     */
    public function search(string $filter = null): LengthAwarePaginator
    {
        return $this->where(function ($query) use($filter) {
            if ($filter) {
                $query->where('name', 'LIKE', "%{$filter}%");
            }
        })->paginate(20);
    }

    /**
     * @return HasOne
     */
    public function stock(): HasOne
    {
        return $this->hasOne(ProductStock::class);
    }
}
