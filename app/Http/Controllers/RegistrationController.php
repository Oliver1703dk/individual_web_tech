<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;


class RegistrationController extends Controller
{

    public function userRegPostAPI(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:1',
            'rpassword' => 'required|same:password',
            'phone' => 'required|numeric'
        ], [
            'rpassword.same' => 'The password and confirmation password do not match.',
        ]);

        // Create a new user
        $user = new User();
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->phone = $validatedData['phone'];
        $user->admin = false;

        // Create a new Cart and associate it with the user
        $cart = new Cart();
        $cart->save();
        $user->cart_id = $cart->id;

        $user->save();

        // Return user data and a success message
        return response()->json([
            'success' => true,
            'user' => $user,
            'message' => 'Registered successfully'
        ], 201);
    }


}
