<?php

namespace Winchester\HdLogger\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Winchester\HdLogger\Models\HdLogger;

class HdLoggerController extends Controller
{
    public function viewLogs(Request $request)
    {
        $per_page = $request->per_page ?? 5;

        $logs = HdLogger::getLogs($per_page);
        return view('hdlogger::view_logs', compact('logs'));
    }

    public function clearSingleLog($id)
    {
        HdLogger::deleteLog($id);
        return redirect()->route('hd.logger.view.logs');
    }

    public function clearAllLogs()
    {
        HdLogger::deleteAllLogs();
        return redirect()->route('hd.logger.view.logs');
    }
}
