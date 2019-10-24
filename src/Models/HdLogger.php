<?php

namespace Winchester\HdLogger\Models;

use Illuminate\Database\Eloquent\Model;

class HdLogger extends Model
{
    protected $table = 'hd_logger';

    //type
    const ERROR = 2;
    const INFO = 1;

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
        return self::orderby('created_at','desc')->paginate($per_page);
    }

    public static function deleteLog($id)
    {
        return self::where(['id' => $id])->delete();
    }

    public static function deleteAllLogs()
    {
        return self::where(['status' => 1])->delete();
    }
}
