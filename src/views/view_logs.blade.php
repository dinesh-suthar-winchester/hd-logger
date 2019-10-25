@extends('hdlogger::app')
@section('content')
    <h1>Logs</h1>
    <a href="{{ route('hd.logger.clear.logs') }}" class="btn btn-danger">Clear All</a>
    {{ $logs->links('hdlogger::pagination') }}
    <table class="table" style="table-layout: fixed">
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
            <tr onclick="show_hide_row('hidden_row{{$log->id}}');">
                <td>{{ $key + $logs->firstItem() }}</td>
                <td>
                    @if(\Winchester\HdLogger\Models\HdLogger::INFO)
                        INFO
                    @elseif(\Winchester\HdLogger\Models\HdLogger::ERROR)
                        ERROR
                    @endif
                </td>
                <td>{{ $log->code }}</td>
                <td>
                    {{ substr($log->message,0, 25).'...' }}
                </td>
                <td style="width:100px; word-wrap:break-word;">{{ $log->file_name }}</td>
                <td>{{ $log->line_no }}</td>
                <td>{{ $log->created_at }}</td>
                <td>
                    <a href="#" class="btn btn-warning">+</a>
                    <a href="{{ route('hd.logger.clear.log',[$log->id]) }}" class="btn btn-danger">Clear</a></td>
            </tr>
            <tr id="hidden_row{{$log->id}}" style="display: none;">
                <td colspan="8">
                    {!! nl2br($log->message) !!}
                </td>
            </tr>
        @endforeach
    </table>

    {{ $logs->links('hdlogger::pagination') }}
@endsection

@section('custom-js')
    <script type="text/javascript">
        function show_hide_row(row)
        {
            $("#"+row).toggle();
        }
    </script>
@endsection
