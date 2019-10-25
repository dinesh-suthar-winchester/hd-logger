<?php
namespace Winchester\HdLogger\Services;

use Illuminate\Support\Facades\Log;
use Winchester\HdLogger\Models\HdLogger;
use Illuminate\Support\Facades\Request;

class HdloggerService
{
    public function insertLogger($exception)
    {

        $code = $exception->getCode();
        $message = $exception->getMessage();
        $filename = $exception->getFile();
        $line_no = $exception->getLine();

        HdLogger::createLog([
            'type' => 2,
            'code' => $code,
            'message' => $message,
            'file_name' => $filename,
            'line_no' => $line_no,
        ]);
    }

    public function instant($message)
    {

        $debug = debug_backtrace();
        HdLogger::createLog([
            'type' => 1,
            'code' => 0,
            'message' => $message,
            'file_name' => Request::route()->getActionMethod() ?? '',
            'line_no' => $debug[0]['line'],
        ]);
    }
}
