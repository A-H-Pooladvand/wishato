<?php

namespace App\Http\Controllers\Product\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;

class FilterController extends Controller
{
    /**
     * @var \App\Repositories\ProductRepository
     */
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Filters products.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $products = $this->productRepository->filter($request);

        return view('product.front.index', compact('products'));
    }
}
