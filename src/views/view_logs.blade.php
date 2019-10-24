@extends('hdlogger::app')
@section('content')
    <h1>Logs</h1>
    <a href="{{ route('hd.logger.clear.logs') }}" class="btn btn-danger">Clear All</a>
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
            <th>Action</th>
        </tr>

        @foreach($logs as $key => $log)
            <tr>
                <td>{{ $key + $logs->firstItem() }}</td>
                <td>
                    @if(\Winchester\HdLogger\Models\HdLogger::INFO)
                        INFO
                    @elseif(\Winchester\HdLogger\Models\HdLogger::ERROR)
                        ERROR
                    @endif
                </td>
                <td>{{ $log->code }}</td>
                <td>{{ $log->message }}</td>
                <td>{{ $log->file_name }}</td>
                <td>{{ $log->line_no }}</td>
                <td>{{ $log->created_at }}</td>
                <td><a href="{{ route('hd.logger.clear.log',[$log->id]) }}" class="btn btn-danger">Clear</a></td>
            </tr>
        @endforeach
    </table>

    {{ $logs->links('hdlogger::pagination') }}
@endsection
