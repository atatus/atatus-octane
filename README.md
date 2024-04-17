# Atatus Laravel Octane Middleware

The Atatus Laravel Octane Middleware enables the automatic instrumentation of API requests, capturing them and sending data to [Atatus for analysis](https://www.atatus.com).


## Requirements

- PHP >= 7.2.0
- Laravel >= 5.5

## How to install

Via Composer

```bash
composer require atatus/atatus-octane
```
or add `atatus/atatus-octane` to your `composer.json` file accordingly.

## How to use

### Add to Middleware

To monitor web requests, you can attach the `WebRequestMonitoring` middleware within the `web` and `api` middleware groups in the `App/Http/Kernel.php` file as shown below:

```php

// In App/Http/Kernel.php

protected $middlewareGroups = [
    'web' => [
        ...,
        \Atatus\Laravel\Octane\Middleware\WebRequestMonitoring::class,
    ],

    'api' => [
        ...,
        \Atatus\Laravel\Octane\Middleware\WebRequestMonitoring::class,
    ]
]
```

## LICENSE

This package is licensed under the [MIT](LICENSE) license.
