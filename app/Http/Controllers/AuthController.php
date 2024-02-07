<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)){
            if(Auth::user()->status != 'active')
            {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                Session::flash('status','failed');
                Session::flash('message','Your Account is not active yet. Pleas contact Admin!');
                return redirect('login');
            }

            $request->session()->regenerate();
            //cek apakah dia admin
            if(Auth::user()->rols_id == 1)
            {
                return redirect('dashboard');
            }

            if(Auth::user()->rols_id == 2)
            {
                return redirect('profile');
            }
        }
            Session::flash('status','failed');
            Session::flash('message','Invalid Login');
            return redirect('login');
    }
    public function logout(Request $request)
        {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }
    public function register()
        {
            return view('register');
        }
    
    public function regis(Request $request)
        {
            $validator = $request->validate([
                'username' => 'required|unique:users',
                'phone' => 'required|max:13',
                'address' => 'required|max:225',
                'password' => 'required|max:8',
            ]);
            $request['password'] = Hash::make($request->password);
            $user = User::create($request->all());

            Session::flash('status','failed');
            Session::flash('message','Regist Success! Pleass, Wait admin to approve');
            return redirect('register');
        }
}
