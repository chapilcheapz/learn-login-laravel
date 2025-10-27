<?php

namespace App\Http\Controllers\Admin;

use App\Models\Accounts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    //
    public function index()
    {
        return view('themeAdmin.Dashboard.adminhome');
    }


    public function formlogin()
    {
        return view('themeAdmin.login.adminlogin');
    }
    public function hanldeLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:6',
        ]);

        $admin = Accounts::where('email', $request->email)
        ->orWhere('phone', $request->email)
            ->where('role', 1)
            ->first();

            if ($admin->role !== 1) {
             return redirect()->route('home');
            }

        if( Hash::check($request->password, $admin->password)) {
            Auth::guard('admin')->login($admin);
            return redirect()->route('admin.dashboard');
        }
    }
}
