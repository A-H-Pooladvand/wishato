<?php

namespace App\Src\Filter;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PriceFilter
{
    /**
     * @var \Illuminate\Database\Eloquent\Builder
     */
    private $query;

    public function __construct(Builder $query)
    {
        $this->query = $query;
    }

    /**
     * Applies price filter on products.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(Request $request)
    {
        return $this->query->whereHas('properties', function (Builder $query) use ($request) {
            $this->priceFilter($query, $request->min, $request->max);
        })->with([
            'properties' => function ($query) use ($request) {
                $this->priceFilter($query, $request->min, $request->max);
            },
        ]);
    }

    /**
     * @param HasMany|Builder $query
     * @param  int|null  $min
     * @param  int|null  $max
     */
    private function priceFilter($query, int $min = null, int $max = null)
    {
        if (null !== $min) {
            $query->where('price', '>=', $min);
        }

        if (null !== $max) {
            $query->where('price', '<=', $max);
        }
    }
}
