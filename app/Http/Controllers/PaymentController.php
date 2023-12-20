<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use \Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function checkoutPage ()
    {
        return view('CheckoutPage');
    }

    public function indexCheckoutPage()
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

        // Pass the cart items to the view
        return view('checkoutPage', compact('cartItems'));
    }

    public function checkoutPagePost(Request $request)
    {
        $request->validate([
            'firstName' => 'required|min:1',
            'lastName' => 'required|min:1',
            'address' => 'required|min:1',
            'zipcode' => 'required|numeric',
            'city' => 'required|min:1',
            'phone' => 'required|numeric',
        ]);

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

        foreach ($cart->products as $product) {
            // Here you subtract the amount bought from the product's quantity
            $boughtQuantity = $product->pivot->quantity;
            $product->quantity -= $boughtQuantity;

            // Save the updated product quantity
            $product->save();
        }


        // Clear the items in the cart
        $cart->products()->detach();

        // Persist the changes to the database
         $cart->save();

        return redirect(route('paymentComplete'))->with('success', 'Payment success');
    }


}
