<?php

namespace App\Http\Controllers;

use App\Models\Accounts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KycController extends Controller
{
    //
    public function verify(Request $request,$id){

        Auth::user()->id;

        $data = $request->validate([
            'cccd_front' => 'required|image|max:2048',
            'cccd_back' => 'required|image|max:2048',
        ]);

        $data['kyc'] = 'Chờ xác minh';

        // dd($data);

    Accounts::where('id', $id)->update($data);

        return redirect()->route('home');

    }
}
