@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <header>
                <h1>New category</h1>
            </header>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="{{ route('admin.categories.store') }}" method="post">
                @csrf
                <div class="form-group mb-3">
                    <label>Name</label>
                    <input class="form-control" type="text" name="name" required maxlength="255">
                </div>
                <button class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
@endsection
