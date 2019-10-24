<?php
namespace Winchester\HdLogger\Facades;

use Illuminate\Support\Facades\Facade;

class HdLoggerFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'hdlogger';
    }
}
