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
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ number_format($product->price, 2, '.', '') }} zł</td>
                            <td>
                                <form action="{{ route('app.add_product_to_cart', ['product' => $product]) }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label>Count</label>
                                        <input class="form-control" type="number" name="count" min="1" step="1" required>
                                    </div>

                                    <button class="btn btn-success" type="submit">Add to cart</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
