<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm(){
        $data['title'] = 'Login';

        return view('login', $data);
    }

    public function login(Request $request){

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)){
            $user  = Auth::user();

            if($user->isAdmin()){
                return redirect()->route('admin.home');

            }elseif(Auth::user()->isSupplier()){
                return redirect()->route('supplier.home');
            }
        }
        return redirect('/');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
