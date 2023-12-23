<?php

namespace App\Http\Controllers;

use App\Models\Product;

//use http\Client\Curl\User;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{

    public function indexAPI()
    {
        $seconds = 3600; // Cache duration

        $products = Cache::remember('products_list', $seconds, function () {
            return Product::all();
        });

        // Pass the products to the view
        return response()->json($products);
    }


    public function getProductsByIdAPI($id)
    {
        $seconds = 3600; // Cache duration

        $product = Cache::remember("product_{$id}", $seconds, function () use ($id) {
            return Product::find($id);
        });

        return response()->json($product);
    }


    public function addProductDBAPI(Request $request)
    {

        $data = $request->only([
            'name', 'price', 'quantity', 'product_info1', 'product_info2', 'product_info3', 'product_info4', 'description', 'image'
        ]);


        // Create a new Product instance and fill it with data
        $product = new Product($data);
        $product->save();

        // Invalidate cache
        Cache::forget('products_list');

        return response()->json(['success' => true, 'message' => 'Product added successfully', 'product' => $product], 201);
    }


    public function deleteProductAPI($id)
    {
        $productId = $id;

        $product = Product::find($productId);
        if ($product) {
            $product->delete();

            // Invalidate caches
            Cache::forget('products_list');
            Cache::forget("product_{$productId}");

            return response()->json(['success' => true, 'message' => 'Product deleted successfully'], 200);
        }

        return response()->json(['failed' => false, 'message' => 'Product not found'], 404);
    }


}



