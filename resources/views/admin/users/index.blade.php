@extends('layouts.app')

@section('content')
    <div class="row mb-3">
        <div class="col">
            <header>
                <h1>Users</h1>
            </header>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <a class="btn btn-success" href="{{ route('admin.users.create') }}">New user</a>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>E-mail</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->first_name }}</td>
                            <td>{{ $user->last_name }}</td>
                            <td>
                                <a class="btn btn-warning" href="{{ route('admin.users.edit', ['user' => $user]) }}">Edit</a>

                                @if(!$user->hasRole('Admin'))
                                    <form action="{{ route('admin.users.destroy', ['user' => $user]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
