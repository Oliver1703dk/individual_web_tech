<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Cart;

// Import the Cart model
use App\Models\Product;

// If you use the Product model, you should import it too
use App\Services\PaymentGateway;

// Import the PaymentGateway service if used
use App\Models\CartProduct;


class CartController extends Controller
{

    public function cart()
    {
        return view('cart');
    }

    public function getCartAPI($userId)
    {
        $user = User::find($userId);

        if ($user && $user->cart) {

            $cart = $user->cart()->with('products')->first();

            $cartItems = $cart->products->map(function ($product) {
                return [
                    'product' => $product,
                    'quantity' => $product->pivot->quantity
                ];
            });

            return response()->json([
                'success' => true,
                'cartItems' => $cartItems
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'No cart found for this user.'
            ], 404);
        }
    }


    public function addProductToCartAPI($userId, $productId)
    {
        $user = User::find($userId);
        $product = Product::find($productId);

        if (!$user) {
            return response()->json(['success' => false, 'message' => 'User not found.'], 404);
        }

        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Product not found.'], 404);
        }

        // Add product to cart
        $existingProduct = $user->cart->products()->where('product_id', $productId)->first();

        if ($existingProduct) {
            // If the product already exists in the cart, update the quantity
            $existingProduct->pivot->quantity += 1;
            $existingProduct->pivot->save();
        } else {
            // If the product is not in the cart, attach it with the given quantity
            $user->cart->products()->attach($productId, ['quantity' => 1]);
        }


        return response()->json(['success' => true, 'message' => 'Product added to cart.']);

    }

    public function minusProductQuantityAPI($userId, $productId)
    {
        $user = User::find($userId);
        $product = Product::find($productId);

        if (!$user) {
            return response()->json(['success' => false, 'message' => 'User not found.'], 404);
        }

        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Product not found.'], 404);
        }

        // Check if the product is in the cart
        $existingProduct = $user->cart->products()->where('product_id', $productId)->first();

        if ($existingProduct) {
            // If the product already exists in the cart, decrement the quantity
            $existingProduct->pivot->quantity -= 1;
            $existingProduct->pivot->save();

            // Remove the product from the cart if the quantity is 0
            if ($existingProduct->pivot->quantity <= 0) {
                $user->cart->products()->detach($productId);
            }

            return response()->json(['success' => true, 'message' => 'Product quantity decremented.']);
        } else {
            return response()->json(['success' => false, 'message' => 'Product not in cart.'], 404);
        }
    }
}
