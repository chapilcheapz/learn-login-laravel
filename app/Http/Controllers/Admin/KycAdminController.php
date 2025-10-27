<?php

namespace App\Http\Controllers\Admin;

use App\Models\Accounts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class KycAdminController extends Controller
{
    public function index()
    {
        $data = Accounts::where('role', 2)
            ->whereIn('kyc', ['Chờ xác minh', 'Đã xác minh'])
            ->get();
        return view('themeAdmin.Kyc.verifyKyc', compact('data'));
    }



    public function verify(Request $request, $id)
    {
        Auth::guard('admin')->user()->id;

        $data = $request->validate([
            'kyc' => 'required|string',
        ]);

        Accounts::where('id', $id)->update(['kyc' => $data['kyc']]);

        return response()->json(['success' => true, 'kyc' => $data['kyc']]);
    }
}
