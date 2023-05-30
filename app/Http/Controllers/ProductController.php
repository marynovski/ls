<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('active', 1)->get();

        if (auth()->user()->hasRole('Admin')) {
            return view('admin.products.index', ['products' => $products]);
        }

        return view('client.products.index', ['products' => $products]);
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.products.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        Product::create([
            'category_id' => $request->get('category_id'),
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'price' => $request->get('price')
        ]);

        return redirect()->route('products.index');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();

        return view('admin.products.edit', ['product' => $product, 'categories' => $categories]);
    }

    public function update(Request $request, Product $product)
    {
        $product->update([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'price' => $request->get('price')
        ]);

        return redirect()->route('products.index');
    }


    public function remove(Product $product)
    {
        $product->update(['active' => 0]);

        return redirect()->route('products.index');
    }
}
