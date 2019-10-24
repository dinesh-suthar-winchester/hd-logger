# hd-logger
a custom laravel error logger which saves data into mysql table

# Installation using composer:

`composer require winchester/hd-logger`

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

# Database migration:

`php artisan migrate`

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

# config/app.php:

Add these lines

Service Provider Array:

`Winchester\HdLogger\HdLoggerServiceProvider::class`

Aliases Array:

`'Hdlogger' => Winchester\HdLogger\Facades\HdLoggerFacade::class`

# Update app/Exceptions/handler.php

```
use Hdlogger;

public function report(Exception $exception)
{
    Hdlogger::insertLogger($exception); // Add this line before parent::report($exception)

    parent::report($exception);
}
```
