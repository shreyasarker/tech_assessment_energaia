@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ $title }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.products.order') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="sku" class="col-md-4 col-form-label text-md-right">SKU</label>

                                <div class="col-md-6">
                                    <input id="sku" type="text" class="form-control" name="sku" value="{{ old('sku') }}" required autocomplete="sku" autofocus>

                                    @isset($errors)
                                        @error('sku')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    @endisset
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Product Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="sku" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @isset($errors)
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    @endisset
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="quantity" class="col-md-4 col-form-label text-md-right">Quantity</label>

                                <div class="col-md-6">
                                    <input id="quantity" type="number" class="form-control" value="{{ old('quantity') }}" required autocomplete="quantity" autofocus>

                                    @isset($errors)
                                        @error('quantity')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    @endisset
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="quantity_unit" class="col-md-4 col-form-label text-md-right">Unit</label>

                                <div class="col-md-6">

                                    <select class="form-control" name="quantity_unit" id="quantity_unit" required>
                                        <option value="">Select Unit</option>
                                        @foreach($units as $unit)
                                            <option value="{{ old('quantity_unit') ?? $unit }}">Unit-({{ $unit }})</option>
                                        @endforeach
                                    </select>

                                    @isset($errors)
                                        @error('quantity_unit')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    @endisset
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="rate" class="col-md-4 col-form-label text-md-right">Rate (Price per item)</label>

                                <div class="col-md-6">
                                    <input id="rate" type="number" class="form-control" name="rate" value="{{ old('rate') }}" required autocomplete="rate" autofocus>

                                    @isset($errors)
                                        @error('rate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    @endisset
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="supplier_id" class="col-md-4 col-form-label text-md-right">Supplier</label>

                                <div class="col-md-6">

                                    <select class="form-control" name="supplier_id" id="supplier_id" required>
                                        <option value="">Select Supplier</option>
                                        @foreach($suppliers as $supplier)
                                            <option value="{{ old('supplier_id') ?? $supplier->id }}">{{ $supplier->name }}</option>
                                        @endforeach
                                    </select>

                                    @isset($errors)
                                        @error('supplier_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    @endisset
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
