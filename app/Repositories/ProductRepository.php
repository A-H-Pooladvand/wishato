<?php

namespace App\Repositories;

use App\Product;
use Illuminate\Http\Request;

class ProductRepository
{
    /**
     * @var \App\Product
     */
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function indexPage()
    {
        return $this->product::with('properties')->paginate();
    }

    /**
     * Filter and search a product and then returns paginated data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function filter(Request $request)
    {
        return $this->product::filter($request)->paginate();
    }
}
