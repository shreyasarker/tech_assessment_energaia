<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm(){
        $data['title'] = 'Login';
        return view('login', $data);
    }
}
