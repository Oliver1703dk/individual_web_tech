<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function changePasswordAPI(Request $request)
    {
        // Validate request
        $request->validate([
            'user_id' => 'required',
            'passwordOld' => 'required',
            'passwordNew' => 'required|min:1',
        ]);

        $user = User::find($request->user_id);

        if (!$user || !Hash::check($request->passwordOld, $user->password)) {
            return response()->json(['success' => false, 'message' => 'Invalid current password'], 401);
        }

        $user->password = Hash::make($request->passwordNew);
        $user->save();

        return response()->json(['success' => true, 'message' => 'Password changed successfully'], 200);
    }
}
