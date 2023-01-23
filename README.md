# Laravel Database Error Logger ( Crash Analytics )

This package provides exception handler which stores errors in the database.
  
  
## Installation

You can install the package via composer:

```bash
composer require winnee0solta/laradblogger
```

You need to publish and run the migrations with:

```bash
php artisan vendor:publish --tag="laradblogger-migrations"
php artisan migrate
```

(Optionally) You can also publish config with:

```bash
php artisan vendor:publish --tag="laradblogger-config" 
```  

## Usage
 
You can start logging errors to the database via try-catch block: 

```php
use Winnee0solta\Laradblogger\LaradbloggerErrorHandler;

try {
    // code that may throw an exception
} catch (Exception $e) { 

    app(LaradbloggerErrorHandler::class)->report($e);
}
```


## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits
 

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
