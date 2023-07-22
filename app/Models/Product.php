<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Pagination\LengthAwarePaginator;

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
    public function movimentation(): HasOne
    {
        return $this->hasOne(Movimentation::class);
    }

    /**
     * @return BelongsTo
     */
    public function consolidation(): BelongsTo
    {
        return $this->belongsTo(Consolidation::class);
    }
}
