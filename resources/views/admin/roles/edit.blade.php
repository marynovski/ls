@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <header>
                <h1>Edit role</h1>
            </header>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="{{ route('admin.roles.update', ['role' => $role]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label>Name</label>
                    <input class="form-control" type="text" name="name" value="{{ $role->name }}" required maxlength="255">
                </div>
                <button class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
@endsection