<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required | string | max:255',
            'description' => 'required | string',
            'image' => 'required | image',
            'quantity' => 'required | numeric',
            'price' => 'required | numeric',
            'is_active' => 'sometimes',
        ]);

        if ($request->hasFile('image')) {
            $file_path = $request->file('image')->store('products/images');
        }

        Product::create([
            'name' => $request->name,
            'user_id' => auth()->user()->id,
            'description' => $request->description,
            'image' =>  $file_path,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'is_active' => $request->is_active == true ? 'active' : 'inactive',
        ]);

        return to_route('products.index')->with('success', 'Product Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {

        $request->validate([
            'name' => 'required | string | max:255',
            'description' => 'required | string ',
            'quantity' => 'required | numeric',
            'price' => 'required | numeric',
            'is_active' => 'sometimes',
        ]);

        if ($request->hasFile('image')) {
            Storage::delete($product->image);
            $product->image = $request->file('image')->store('products/images');
        }

        $product->update([
            'name' => $request->name,
            'user_id' => auth()->user()->id,
            'description' => $request->description,
            'image' =>  $product->image,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'is_active' => $request->is_active == true ? 'active' : 'inactive',
        ]);

        return to_route('products.index')->with('success', 'Product updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Storage::delete($product->image);
        $product->delete();

        return to_route('products.index')->with('success', 'Product Deleted');
    }
}
