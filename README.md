# Atatus Laravel Octane Middleware

Atatus Laravel Swoole Middleware allows for the automatic capture of API request and sends them to [Atatus](https://www.atatus.com).


## Requirements

- PHP >= 7.2.0
- Laravel >= 5.5

## How to install

Via Composer

```bash
composer require atatus/atatus-octane
```
or add 'atatus/atatus-octane' to your composer.json file accordingly.

## How to use

### Add to Middleware

To monitor web requests you can attach the WebMonitoringMiddleware in your http kernel or use in one or more route groups based on your personal needs.

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

```
