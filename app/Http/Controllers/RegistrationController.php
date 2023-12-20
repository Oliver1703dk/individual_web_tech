<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function userReg()
    {
        return view('userReg');
    }

    public function userRegPost(Request $request)
    {

        // Validate the request data
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:1',
            'rpassword' => 'required|same:password',
            'phone' => 'required|numeric'
        ], [
            'rpassword.same' => 'The password and confirmation password do not match.',
        ]);


        // Check if a user with the given email already exists
        $existingUser = User::where('email', $request->email)->first();



        if($existingUser){
            return Redirect::back()->withInput()->withErrors(['email' => 'This email is already registered']);
        }

        // Create a new Cart and associate it with the customer
        $cart = new Cart();
        $cart->save();

        $user = new User();

        $user->email = $request->email;
        $user->password = $request->password;
        $user->phone = $request->phone;

        $user->admin = false;
        $user->cart_id;

        $user->cart_id = $cart->id;

        $user->save();



        Auth::login($user);

        return redirect(route('index'))->with('success', 'Register sucessfully');

    }


}
