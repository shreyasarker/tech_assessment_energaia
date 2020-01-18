@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ $title }}</div>

                    <div class="card-body">
                        @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                        @endif

                        @if(isset($errors))
                        @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @endif
                        <form method="POST" action="{{ url('/admin/products/orderData') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="sku" class="col-md-4 col-form-label text-md-right">SKU</label>

                                <div class="col-md-6">
                                    <input id="sku" type="text" class="form-control" name="sku" value="{{ old('sku') }}" required autocomplete="sku" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Product Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="quantity" class="col-md-4 col-form-label text-md-right">Quantity</label>

                                <div class="col-md-6">
                                    <input id="quantity" type="number" name="quantity" class="form-control" value="{{ old('quantity') }}" required autocomplete="quantity" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="quantity_unit" class="col-md-4 col-form-label text-md-right">Unit</label>

                                <div class="col-md-6">

                                    <select class="form-control" name="quantity_unit" id="quantity_unit" required>
                                        <option value="">Select Unit</option>
                                        @foreach($units as $unit)
                                            <option value="{{$unit}}" {{(old('quantity_unit')==$unit)? 'selected':''}}>Unit-({{ $unit }})</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="rate" class="col-md-4 col-form-label text-md-right">Rate (Price per item)</label>

                                <div class="col-md-6">
                                    <input id="rate" type="number" class="form-control" name="rate" value="{{ old('rate') }}" required autocomplete="rate" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="supplier_id" class="col-md-4 col-form-label text-md-right">Supplier</label>

                                <div class="col-md-6">

                                    <select class="form-control" name="supplier_id" id="supplier_id" required>
                                        <option value="">Select Supplier</option>
                                        @foreach($suppliers as $supplier)
                                            <option value="{{$supplier->id}}" {{(old('supplier_id')==$supplier->id)? 'selected':''}}>{{$supplier->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Order</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
