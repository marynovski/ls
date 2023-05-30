@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <header>
                <h1>Edit category</h1>
            </header>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="{{ route('admin.categories.update', ['category' => $category]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label>Name</label>
                    <input class="form-control" type="text" name="name" value="{{ $category->name }}" required maxlength="255">
                </div>
                <button class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
@endsection