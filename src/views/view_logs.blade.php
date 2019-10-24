@extends('hdlogger::app')
@section('content')
    <h1>Logs</h1>

    <table class="table">
        <tr>
            <th>Sr</th>
            <th>Type</th>
            <th>Code</th>
            <th>Message</th>
            <th>Filename</th>
            <th>Line No</th>
            <th>Action</th>
        </tr>

        @foreach($logs as $key => $log)
            <tr>
                <td>{{ $key + $logs->firstItem() }}</td>
                <td>{{ $log->type }}</td>
                <td>{{ $log->code }}</td>
                <td>{{ $log->message }}</td>
                <td>{{ $log->file_name }}</td>
                <td>{{ $log->line_no }}</td>
                <td>Action</td>
            </tr>
        @endforeach
    </table>
@endsection
