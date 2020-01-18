@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">

                    <div class="card-header">
                        <h4>{{$title}}</h4>
                    </div>

                    <div class="card-body">

                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{Session::get('success')}}
                            </div>
                        @endif

                        <table class="table table-bordered">
                            <thead class="table-info">
                            <tr>
                                <th>Si</th>
                                <th>SKU</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Price (per item)</th>
                                <th>Supplier</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($list) > 0)
                                @php
                                    $index = 1;
                                @endphp
                                @foreach($list as $value)
                                    <tr>
                                        <td>{{ $index++ }}</td>
                                        <td>{{ $value->sku }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->quantity }} ({{ $value->quantity_unit }})</td>
                                        <td>{{ $value->rate }}</td>
                                        <td>{{ $value->supplier->name }}</td>
                                        <td><a href="{{ route('supplier.products.send', $value->id) }}" class="btn btn-sm btn-success">Send to Company</a></td>
                                    </tr>
                                @endforeach
                            @else
                                <tr class="alert-warning">
                                    <td colspan="7" class="text-center">No information found</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                        <div class="float-right">
                            {{ $list->render() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
