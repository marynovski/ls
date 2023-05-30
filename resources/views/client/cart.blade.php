@extends('layouts.app')

@section('content')
    <div class="row mb-3">
        <div class="col">
            <header>
                <h1>Cart</h1>
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
                        <th>Count</th>
                        <th>Price</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @empty($cart->cartProducts)
                        <tr>
                            <td colspan="5">Your cart is empty</td>
                        </tr>
                    @else
                        @foreach($cart->cartProducts as $cartProduct)
                            <tr>
                                <td>{{ $cartProduct->product->name }}</td>
                                <td>{{ $cartProduct->product->description }}</td>
                                <td>{{ $cartProduct->count }}</td>
                                <td>{{ number_format($cartProduct->product->price * $cartProduct->count, 2, '.', '') }} zł</td>
                            </tr>
                            <!-- usuwanie z koszyka, ew. zmiana ilosci produktow -->
                        @endforeach
                        <tr>
                            <td colspan="5">
                                <!-- make an order -->
                                <form action="{{ route('app.order') }}" method="post">
                                    @csrf
                                    <button class="btn btn-success">Order</button>
                                </form>
                            </td>
                        </tr>
                    @endempty
                </tbody>
            </table>
        </div>
    </div>
@endsection
