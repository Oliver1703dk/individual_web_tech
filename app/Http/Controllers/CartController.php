<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Cart; // Import the Cart model
use App\Models\Product; // If you use the Product model, you should import it too
use App\Services\PaymentGateway; // Import the PaymentGateway service if used
use App\Models\CartProduct;


class CartController extends Controller {

    public function cart()
    {
        return view('cart');
    }


    public function minusQuantity(Request $request){
        $productId = $request->input('product_id');


        // Check if the user is authenticated
        if (auth()->check()) {
            $user = auth()->user();

            // Checks if the user has a cart
            if ($user->cart) {
                $cart = $user->cart;

            } else {
                // If the user doesn't have a cart, create a new one
                $cart = new Cart();
                $user->cart()->save($cart);
            }


            // Code to minus that item
            $existingProduct = $cart->products()->where('product_id', $productId)->first();


            if ($existingProduct && $existingProduct->pivot->quantity > 0) {
                // Decrement the quantity by 1
                $existingProduct->pivot->quantity -= 1;
                $existingProduct->pivot->save();

                // Optional: remove the product from the cart if the quantity is 0
                if ($existingProduct->pivot->quantity === 0) {
                    $cart->products()->detach($productId);
                }
            }

//            $cart->minusItem($productId);
            return redirect()->back()->with('success', 'Product minus one to cart successfully.');


        } else {
            // User is not logged in
            return redirect(route('cart'))->with('failed', 'Not added to cart');
        }


    }



    public function addItem(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');
        // Check if the user is authenticated
        if (auth()->check()) {
            $user = auth()->user();

            // Check if the user has a cart
            if ($user->cart) {
                $cart = $user->cart;
            } else {
                // If the user doesn't have a cart, create a new one
                $cart = new Cart();
                $user->cart()->save($cart);
            }

            // Add the product to the cart
            $existingProduct = $cart->products()->where('product_id', $productId)->first();

            if ($existingProduct) {
                // If the product already exists in the cart, update the quantity
                $existingProduct->pivot->quantity += $quantity;
                $existingProduct->pivot->save();
            } else {
                // If the product is not in the cart, attach it with the given quantity

                $cart->products()->attach($productId, ['quantity' => $quantity]);
            }

            sleep(0.5); // Add a 1-second delay
            return redirect()->back()->with('success', 'Product added to cart successfully.');
        } else {
            // User is not logged in
            sleep(0.5); // Add a 1-second delay
            return redirect(route('login'))->with('failed', 'Not logged in');
        }
    }

    public function getItems() {
        return $this->items;

    }

    public function index()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();

        // Fetch the cart for the authenticated user
        $cart = Cart::with('products')->find($user->cart_id);

        if (!$cart) {
            // Handle the case where the cart doesn't exist
            return view('cart')->with('cartItems', []);
        }

        // Retrieve products and their quantities from the pivot table
        $cartItems = $cart->products->map(function ($product) {
            return [
                'product' => $product,
                'quantity' => $product->pivot->quantity
            ];
        });

        return view('cart', compact('cartItems'));
    }

}
