<?php

namespace App\Http\Controllers;

use App\Models\Accounts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function index()
    {
        return view('themes.login.homelogin');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:6',
        ]);


        $user = Accounts::where('email', $request->email)
            ->orWhere('phone', $request->email)
            ->where('role', 2)
            ->first();

            if ($user->role !== 2) {
             return redirect()->route('home');
            }


        if (Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->route('home.login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return view('themes.home');
    }
}
