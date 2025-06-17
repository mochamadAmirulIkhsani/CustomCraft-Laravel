<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Show the list of products.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        // Get the list of products ordered by the latest one first
        $products = Product::latest()->get();

        // Pass the list of products to the view
        return view('pages.catalogue', ['products' => $products]);
    }

    public function show(Product $product): View
    {
        return view('pages.product-detail', ['product' => $product]);
    }
}
