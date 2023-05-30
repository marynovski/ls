@extends('layouts.app')

@section('content')
    <div class="row mb-3">
        <div class="col">
            <header>
                <h1>Logs</h1>
            </header>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>Id</th>
                        <th>Date</th>
                        <th>Title</th>
                        <th>Message</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($logs as $log)
                        <tr>
                            <th>
                                @if($log->type === \App\Models\Log::LOG_ERROR)
                                    <span class="text-danger">Error</span>
                                @elseif($log->type === \App\Models\Log::LOG_WARNING)
                                    <span class="text-warning">Warning</span>
                                @else
                                    <span class="text-info">Info</span>
                                @endif
                            </th>
                            <td>{{ $log->id }}</td>
                            <td>{{ $log->date }}</td>
                            <td>{{ $log->title }}</td>
                            <td>{{ $log->message }}</td>
                            <td>
                                <form action="{{ route('admin.logs.destroy', ['log' => $log]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
