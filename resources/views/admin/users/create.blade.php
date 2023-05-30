@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <header>
                <h1>New user</h1>
            </header>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="{{ route('admin.users.store') }}" method="post">
                @csrf
                <div class="form-group mb-3">
                    <label>Name</label>
                    <input class="form-control" type="text" name="name" required maxlength="255">
                </div>
                <div class="form-group mb-3">
                    <label>E-mail</label>
                    <input class="form-control" type="email" name="email" required maxlength="255">
                </div>
                <div class="form-group mb-3">
                    <label>Password</label>
                    <input class="form-control" type="password" name="password" required maxlength="255">
                </div>
                <div class="form-group mb-3">
                    <label>First name</label>
                    <input class="form-control" type="text" name="first_name" required maxlength="255">
                </div>
                <div class="form-group mb-3">
                    <label>Last name</label>
                    <input class="form-control" type="text" name="last_name" required maxlength="255">
                </div>
                <div class="form-group mb-3">
                    <label>Role</label>
                    <select class="form-control" name="role">
                        @foreach($roles as $role)
                            <option value="{{ $role }}">{{ $role }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
@endsection
