<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){

        $data['title'] = 'Home';

        if(Auth::user()->isAdmin()){
            $data['title'] = 'Admin Dashboard';
        }else{
            $data['title'] = 'Supplier Dashboard';
        }

        return view('home', $data);
    }
}
