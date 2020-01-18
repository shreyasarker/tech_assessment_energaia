<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showOrderPage(){
        $data['title'] = 'Order Product';

        return view('products.order', $data);
    }
}
