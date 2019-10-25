# hd-logger
a custom laravel error logger which saves data into mysql table

# Installation using composer:

`composer require winchester/hd-logger`

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

# Edit config/app.php:

Add these lines

Service Provider Array:

`Winchester\HdLogger\HdLoggerServiceProvider::class`

Aliases Array:

`'Hdlogger' => Winchester\HdLogger\Facades\HdLoggerFacade::class`

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

# Database migration:

`php artisan migrate`

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


# Update app/Exceptions/handler.php

```
use Hdlogger;

public function report(Exception $exception)
{
    Hdlogger::insertLogger($exception); // Add this line before parent::report($exception)

    parent::report($exception);
}
```


# Log general info in runtime

in your controller class:

```
use Hdlogger;

public function controllerMethod()
{
    Hdlogger::instant('Log this line in database'); // Example of usage
}
```

# View generated logs url

Simply append `/hd-logger` at end of your base url.
Example: `http://localhost:8000/hd-logger`
