<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
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


        if ($request->hasFile('cccd_front')) {
            $frontImage = $request->file('cccd_front');
            $frontImageName = time() . '_front.' . $frontImage->getClientOriginalExtension();
            $frontImage->move(public_path('storage/cccd'), $frontImageName);
            $data['cccd_front'] = $frontImageName;
        }

        if ($request->hasFile('cccd_back')) {
            $backImage = $request->file('cccd_back');
            $backImageName = time() . '_back.' . $backImage->getClientOriginalExtension();
            $backImage->move(public_path('storage/cccd'), $backImageName);
            $data['cccd_back'] = $backImageName;
        }

        $data['kyc'] = 'Chờ xác minh';

        // dd($data);

    Accounts::where('id', $id)->update($data);

        return redirect()->route('home');

    }
}
