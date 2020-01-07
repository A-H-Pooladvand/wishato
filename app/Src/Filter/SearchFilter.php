<?php

namespace App\Src\Filter;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class SearchFilter
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
        if (empty($request->q)) {
            return $this->query;
        }

        $search = $request->q;

        return $this->query->where('name', 'LIKE', "%{$search}%");
    }
}
