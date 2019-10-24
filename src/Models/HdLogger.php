<?php

namespace Winchester\HdLogger\Models;

use Illuminate\Database\Eloquent\Model;

class HdLogger extends Model
{
    protected $table = 'hd_logger';

    public static function createLog($data)
    {
        $log = new self();

        $log->type = $data['type'];
        $log->code = $data['code'];
        $log->message = $data['message'];
        $log->file_name = $data['file_name'];
        $log->line_no = $data['line_no'];

        $log->save();
        return $log;
    }

    public static function getLogs($per_page = 10)
    {
        return self::paginate($per_page);
    }
}
