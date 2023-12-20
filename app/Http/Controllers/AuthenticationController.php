<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;

class AuthenticationController extends Controller {
    public function login()
    {
        return view('login');
    }
    public function loginPost(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {

            return redirect('/')->with('success', 'login');
        }

        return back()->with('error', 'Email or phone');
    }
    public function logoutPost(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }


}
