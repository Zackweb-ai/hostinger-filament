<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();
        return response()->json($products);
    }

    public function store(Request $request)
{
    try {
        $product = Product::create([
            'brand_id' => $request->brand_id,
            'name' => $request->name,
            'slug' => $request->slug,
            'sku' => $request->sku,
            'description' => $request->description,
            'image' => $request->image,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'is_visible' => $request->is_visible,
            'is_featured' => $request->is_featured,
            'type' => $request->type,
            'published_at' => $request->published_at,
        ]);

        // Optionally, return a success response if creation is successful
        return response()->json(['message' => 'Product created successfully', 'product' => $product], 201);
    } catch (\Exception $e) {
        // If an error occurs during product creation, return an error response
        return response()->json(['message' => 'Failed to create product', 'error' => $e->getMessage()], 500);
    }
}

}
