<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{

    public function checkoutPagePostAPI(Request $request, $userId)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'firstName' => 'required|min:1',
            'lastName' => 'required|min:1',
            'address' => 'required|min:1',
            'zipcode' => 'required|numeric',
            'city' => 'required|min:1',
            'phone' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 400);
        }

        // Fetch the user by ID
        $user = User::find($userId);
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'User not found.'], 404);
        }

        // Fetch the user's cart
        $cart = Cart::with('products')->find($user->cart_id);
        if (!$cart || $cart->products->isEmpty()) {
            return response()->json(['success' => false, 'message' => 'No cart found for this user.'], 404);
        }

        foreach ($cart->products as $product) {
            $boughtQuantity = $product->pivot->quantity;
            $product->quantity -= $boughtQuantity;
            $product->save();
        }

        // Clear the items in the cart
        $cart->products()->detach();

        // Return a success message with a success key
        return response()->json(['success' => true, 'message' => 'Payment success.'], 200);
    }


}
