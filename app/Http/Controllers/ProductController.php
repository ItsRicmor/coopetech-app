<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Product;


class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return Inertia::render('Products', [
            'products' => $products
        ]);
    }
}
