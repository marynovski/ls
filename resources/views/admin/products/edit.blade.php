@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <header>
                <h1>Edit product</h1>
            </header>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="{{ route('products.update', ['product' => $product]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label>Name</label>
                    <input class="form-control" type="text" name="name" value="{{ $product->name }}" required maxlength="255">
                </div>
                <div class="form-group mb-3">
                    <label>Description</label>
                    <textarea class="form-control" name="description" required maxlength="255">{{ $product->description }}</textarea>
                </div>
                <div class="form-group mb-3">
                    <label>Price</label>
                    <input class="form-control" type="number" name="name" value="{{ $product->price }}" step="0.01" required min="0.01">
                </div>
                <div class="form-group mb-3">
                    <label>Category</label>
                    <select class="form-control" name="category_id" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" @if($product->category_id === $category->id) selected @endif>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
@endsection