<?php
namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;

use App\Models\Accounts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Symfony\Component\String\b;

class RegisterController extends Controller
{
    public function register()
    {
        return view('themes.register.register');
    }


    public function hanldeRegister(Request $request)
    {
        $data = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        
        $data['password'] = bcrypt($data['password']);
        Accounts::create($data);

        return redirect()->route('home.login');
    }
}
