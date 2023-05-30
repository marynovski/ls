@extends('layouts.app')

@section('content')
    <div class="row mb-3">
        <div class="col">
            <header>
                <h1>Products</h1>
            </header>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <a class="btn btn-success" href="{{ route('products.create') }}">New product</a>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ number_format($product->price, 2, '.', '') }} zł</td>
                            <td>
                                <a class="btn btn-warning" href="{{ route('products.edit', ['product' => $product]) }}">
                                    Edit
                                </a>
                                <a class="btn btn-danger" href="{{ route('products.remove', ['product' => $product]) }}">
                                    Remove
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
