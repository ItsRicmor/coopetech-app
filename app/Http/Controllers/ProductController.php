<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(Request $request) {
        return Inertia::render('Products/IndexPage', [ 
            'products' => Product::orderBy('updated_at', 'DESC')->get()->load('brand', 'category')
        ]);
    }

    public function create(Request $request) {
        return Inertia::render('Products/CreatePage', [ 
            'brands' => Brand::orderBy('display_name')->get(),
            'categories' => Category::orderBy('display_name')->get() 
        ]);
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'code_id' => 'required|string|max:20|unique:products',
            'display_name' => 'required|string|max:50|unique:products',
            'description' => 'required|string|max:60',
            'quantity' => 'required|integer|max:9999',
            'price' => 'required|numeric|max:999999',
            'brand_id' => 'required',
            'category_id' => 'required',
        ])->validate();
 
        $product = Product::create([
            'code_id' => $request->code_id,
            'display_name' => $request->display_name,
            'name_slug' => $request->name_slug,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
        ]);
        
        return redirect()->route('products.index')->with('message', ['success','Producto creado correctamente.']);
    }
}