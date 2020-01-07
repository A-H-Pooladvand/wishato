<?php

namespace App;

use App\Src\Filter\Filter;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $appends = [
        'average_price',
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Get all prices of the product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function properties(): HasMany
    {
        return $this->hasMany(ProductProperty::class, 'product_id');
    }

    /**
     * Get last assigned price.
     *
     * Note: To easily fetch the latest assigned price.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function property(): HasOne
    {
        return $this->hasOne(ProductProperty::class, 'product_id')->latest();
    }

    /**
     * Search in products names.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $search
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch(Builder $query, string $search): Builder
    {
        return $query->where('name', 'LIKE', "%{$search}%");
    }

    /**
     * Filters products by searched keyword or price range.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Product|\Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilter(Builder $query, Request $request)
    {
        return (new Filter($query))->apply($request);
    }
}
