# Laravel Flash
An slightly modified version of jeffrey way's `laracasts/flash` composer package to issue the flash notifications based on 
[toastr js](https://github.com/CodeSeven/toastr).

# Installation
The package is available on composer. Available for laravel 5.1+

```bash
composer install leantony/laravel-flash
```

Once you have installed, you need to add the service provider to your `app.php` configuration. Like so;

```php
Leantony\Flash\Providers\ServiceProvider::class
```

If you are using laravel 5.5+, the provider will be discovered automatically. No need to add it manually to `app.php`

# Publishing assets
You'll need to publish the javascript so that you can add it to your blade view/layout. To do so, you can run this command;
```php
php artisan vendor:publish --provider="Leantony\Flash\Providers\ServiceProvider" --tag="assets"
```

# Make changes to your view/layout
> Note that you'll need the toastr js asset loaded before the js provided by this package

```php
<--- toastr js --->
<script src="{{ asset('vendor/leantony/flash/js/flash.js') }}"></script>

@include('leantony::flash.toast')
```

# Usage
Same as `laracasts/flash`. Anytime you `flash('some message')`, [depending on how you call the function](https://github.com/laracasts/flash#usage), the alert you get should be a toastr
notification.