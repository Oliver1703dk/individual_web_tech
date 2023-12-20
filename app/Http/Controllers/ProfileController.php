<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class ProfileController extends Controller
{
    public function showProfile()
    {
        $user = auth()->user();

        return view('profile', compact('user'));

    }

    public function changePassword(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'passwordOld' => 'required',
            'passwordNew1' => 'required|min:1',
            'passwordNew2' => 'required|min:1|same:passwordNew1'
        ]);


        if (!Hash::check($request->passwordOld, $user->password)) {

            return back()->withErrors(['passwordOld' => 'The provided password does not match our records.']);
        }

        if ($request->passwordNew1 !== $request->passwordNew2) {

            return back()->withErrors(['passwordNew1' => 'The new passwords do not match.']);
        }

        $user->password = Hash::make($request->passwordNew1);
        $user->save();


        return redirect(route('index'))->with('success', 'Password changed successfully');
    }
}
