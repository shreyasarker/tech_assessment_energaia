<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function showOrderPage(){
        $data['title'] = 'Order Product';

        $data['suppliers'] = User::getSupplier()->get();
        $data['units'] = config('enums.quantity_units');

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
