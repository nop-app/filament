# Nop for Filament

[![Latest Version on Packagist](https://img.shields.io/packagist/v/nop-app/filament.svg?style=flat-square)](https://packagist.org/packages/nop-app/filament)
[![Total Downloads](https://img.shields.io/packagist/dt/nop-app/filament.svg?style=flat-square)](https://packagist.org/packages/nop-app/filament)

Integrate Nop with [Filament](https://filamentadmin.com). The package will enable Nop on all the edit pages of your Filament admin dashboard, e.g. `/admin/projects/<id>/edit`, preventing multiple users to access the same page simultaneously.

## Installation

Install the package via composer:

```bash
composer require nop-app/filament
```

Then publish the package config file:

```bash
php artisan vendor:publish --tag=nop-config
```

## Configuration

There are a few notable configuration options for the package.

Key | Type | Description
------------ | ------------- | -------------
`token` | String | Your Nop token. If you don't have a project yet, create one for free at https://nop.is/account/projects/create.
`enabled_routes` | Array | List of routes (RegExp) where Nop should be enabled. By default it will be enabled in every "resource" edit page.
`user_name_field` | String\|Null | The field corresponding to current authenticated user "name".
`settings` | Array | Additional Nop settings. You can take a look to the [official Docs](https://docs.nop.is/usage/settings.html) to find out more.

### Advanced user name

If you need advanced logic for the user "name" field, you can set `user_name_field` to `null` in your `config/nop.php` file and then, although it's not defined in the values, set the `nop.name` config.  
For example in a middleware you can do:

```php
// app/Http/Middleware/NopUser.php

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Config;

class NopUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            Config::set('nop.user', $userName);
        }

        return $next($request);
    }
}
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email danilo.polani@gmail.com instead of using the issue tracker.

## Credits

- [Danilo Polani](https://github.com/danilopolani)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
