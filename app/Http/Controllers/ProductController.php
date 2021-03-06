<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function showOrderPage(){
        $data['title'] = 'Order Product';

        $data['suppliers'] = User::getSupplier()->get();
        $data['units'] = config('enums.quantity_units');

        return view('products.order', $data);
    }

    public function order(Request $request){
        $validator = Validator::make($request->all(), [
            'sku' => 'required',
            'name' => 'required',
            'quantity' => 'required|numeric',
            'quantity_unit' => 'required',
            'rate' => 'required|numeric',
            'supplier_id' => 'required|numeric',
        ]);

        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        Product::create($request->all());

        Session::flash('success', 'Order has been placed successfully!');
        return redirect()->route('admin.products.showOrderPage');
    }

    public function receivedProductsForAdmin(){
        $data['title'] = 'Received Products';

        $data['list'] = Product::getReceived()->orderBy('id', 'desc')->paginate(10);

        return view('products.received', $data);
    }

    public function receivedOrderForSupplier(){
        $data['title'] = 'Received Orders';

        $data['list'] = Product::getOrdered()->orderBy('id', 'desc')->paginate(10);

        return view('products.ordered', $data);
    }

    public function sendProductToAdmin($id){

        $product = Product::findOrFail($id);
        $product->status = 1;
        $product->save();

        Session::flash('success', 'Product has been sent successfully!');
        return redirect()->route('supplier.products.orders');
    }
}
