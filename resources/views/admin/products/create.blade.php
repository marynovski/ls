@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <header>
                <h1>New product</h1>
            </header>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="{{ route('products.store') }}" method="post">
                @csrf
                <div class="form-group mb-3">
                    <label>Name</label>
                    <input class="form-control" type="text" name="name" required maxlength="255">
                </div>
                <div class="form-group mb-3">
                    <label>Description</label>
                    <textarea class="form-control" name="description" required maxlength="255"></textarea>
                </div>
                <div class="form-group mb-3">
                    <label>Price</label>
                    <input class="form-control" type="number" name="price" step="0.01" required min="0.01">
                </div>
                <div class="form-group mb-3">
                    <label>Category</label>
                    <select class="form-control" name="category_id" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
@endsection
