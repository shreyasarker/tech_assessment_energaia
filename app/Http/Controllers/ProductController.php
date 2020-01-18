<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function showOrderPage(){
        $data['title'] = 'Order Product';

        return view('products.order', $data);
    }

    public function order(Request $request){
        $request->validate([
            'sku' => 'required',
            'name' => 'required',
            'quantity' => 'required|numeric',
            'quantity_unit' => 'required',
            'rate' => 'required|numeric',
            'supplier_id' => 'required|numeric',
        ]);
    }
}
