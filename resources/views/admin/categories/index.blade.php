@extends('layouts.app')

@section('content')
    <div class="row mb-3">
        <div class="col">
            <header>
                <h1>Categories</h1>
            </header>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <a class="btn btn-success" href="{{ route('admin.categories.create') }}">New category</a>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a class="btn btn-warning" href="{{ route('admin.categories.edit', ['category' => $category]) }}">
                                    Edit
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
