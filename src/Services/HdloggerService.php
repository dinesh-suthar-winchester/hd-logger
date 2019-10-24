<?php
namespace Winchester\HdLogger\Services;

use Winchester\HdLogger\Models\HdLogger;

class HdloggerService
{
    public function insertLogger($type, $code=null, $message, $filename, $line_no)
    {
        HdLogger::createLog([
            'type' => $type,
            'code' => $code,
            'message' => $message,
            'file_name' => $filename,
            'line_no' => $line_no,
        ]);
    }
}
