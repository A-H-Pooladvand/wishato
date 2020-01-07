<?php

namespace App\Src\Filter;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class Filter
{
    private $filters = [
        SearchFilter::class,
        PriceFilter::class,
    ];

    /**
     * @var \Illuminate\Database\Eloquent\Builder
     */
    private $query;

    public function __construct(Builder $query)
    {
        $this->query = $query;
    }

    /**
     * Applies filter on products.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(Request $request): Builder
    {
        foreach ($this->filters as $filter) {
            (new $filter($this->query))->apply($request);
        }

        return $this->query;
    }
}
