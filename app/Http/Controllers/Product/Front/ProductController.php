<?php

namespace App\Http\Controllers\Product\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\ProductRepository;

class ProductController extends Controller
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
     * Products index.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $products = $this->productRepository->indexPage();

        return view('product.front.index', compact('products'));
    }
}
