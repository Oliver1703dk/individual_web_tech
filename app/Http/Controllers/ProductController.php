<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function deleteProduct(Request $request){
        $productId = $request->input('product_id');
        if(auth()->user()->admin){

            // Find the product by ID
            $product = Product::find($productId);

            if ($product) {
                // Delete the product
                $product->delete();

                // Redirect or return a response
                return redirect()->route('index')->with('success', 'Product deleted successfully.');
            } else {
                // Handle the case where the product does not exist
                return redirect()->back()->with('error', 'Product not found.');
            }

        }else{
            return redirect()->back()->with('error', 'Product not found.');
        }

    }

    public function productPage(Request $request)
    {
        $productId = $request->input('product_id');

        $product = Product::find($productId);

        // Check if product exists
        if (!$product) {
            return redirect()->back()->withErrors('Product not found.');
        }



        return view('productPage', compact('product'));


    }

    public function index()
    {
        // Fetch products from the database
        $products = Product::all();

        // Pass the products to the view
        return view('index', compact('products'));
    }

    public function indexProducts()
    {
        // Fetch products from the database
        $products = Product::all();

        // Pass the products to the view
        return view('productsCatalog', compact('products'));
    }

    public function productPageAdmin(){
        return view('productPageAdmin');
    }

    public function addProductDB(Request $request){
        // Retrieve product data from the request
        $data = $request->only([
            'name', 'price', 'qty', 'storage', 'CPU', 'RAM', 'SSD', 'Desc', 'Image'
        ]);
        if(auth()->user()->admin){

            // Create a new Product instance and fill it with data
            $product = new Product();
            $product->name = $data['name'];
            $product->price = $data['price'];
            $product->description = $data['Desc'];
            $product->quantity = $data['qty'];
            $product->product_info1 = $data['storage'];
            $product->product_info2 = $data['CPU'];
            $product->product_info3 = $data['RAM'];
            $product->product_info4 = $data['SSD'];
            $product->image = $data['Image'];

            // Save the product
            $product->save();

            // Redirect or return a response
            return redirect()->route('index');

        }else {
            return redirect()->back()->with('error', 'not admin user.');
        }


    }








}



