@extends('hdlogger::app')
@section('content')
    <h1>Logs</h1>

    {{ $logs->links('hdlogger::pagination') }}
    <table class="table">
        <tr>
            <th>Sr</th>
            <th>Type</th>
            <th>Code</th>
            <th>Message</th>
            <th>Filename</th>
            <th>Line No</th>
            <th>Date</th>
        </tr>

        @foreach($logs as $key => $log)
            <tr>
                <td>{{ $key + $logs->firstItem() }}</td>
                <td>{{ $log->type }}</td>
                <td>{{ $log->code }}</td>
                <td>{{ $log->message }}</td>
                <td>{{ $log->file_name }}</td>
                <td>{{ $log->line_no }}</td>
                <td>{{ $log->created_at }}</td>
            </tr>
        @endforeach
    </table>

    {{ $logs->links('hdlogger::pagination') }}
@endsection
