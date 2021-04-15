<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserAuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function check(Request $request)
    {       
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5'
        ]);

        $user = User::where('email', '=', $request->email)->first();
        if($user)
        {
            if(Hash::check($request->password, $user->password))
            {
                $request->session()->put('LoggedUser', $user);

                return redirect('dashboard')->with(array('user' => $user));
            }
            else
            {
                return back()->with('fail','Palavra-Passe incorreta');
            }
        }else{
            return back()->with('fail','Este email não corresponde a uma conta.');
        }
    
    }

    public function logout()
    {
        if(session()->has('LoggedUser'))
        {
            session()->pull('LoggedUser');
            return redirect('login');
        }
    }
}
