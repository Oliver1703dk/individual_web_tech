<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;

class AuthenticationController extends Controller {


    public function loginPostAPI(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed
            return response()->json(['success' => true, 'message' => 'Authentication successful'], 200);
        }

        // Authentication failed
        return response()->json(['success' => false, 'message' => 'Invalid credentials'], 401);
    }



    public function login()
    {
        return view('login');
    }



}
