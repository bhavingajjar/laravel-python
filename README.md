# Run Python scripts inside your Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/bhavingajjar/laravel-python.svg?style=flat-square)](https://packagist.org/packages/bhavingajjar/laravel-python)
[![Total Downloads](https://img.shields.io/packagist/dt/bhavingajjar/laravel-python.svg?style=flat-square)](https://packagist.org/packages/bhavingajjar/laravel-python)
![GitHub Actions](https://github.com/bhavingajjar/laravel-python/actions/workflows/main.yml/badge.svg)

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what
PSRs you support to avoid any confusion with users and contributors.

## Installation

You can install the package via composer:

```bash
composer require bhavingajjar/laravel-python
```

## Publish Configuration File

```bash
php artisan vendor:publish --provider="Bhavingajjar\LaravelPython\LaravelPythonServiceProvider" --tag="config"
```

## Usage

Using Dependency injection

```php
use Bhavingajjar\LaravelPython\LaravelPython;

$python = new LaravelPython();
$result = $python->run('hello.py');
```

Using Dependency injection

```php
public function index(LaravelPython $python){
    $result = $python->run('hello.py');
}
```

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email gajjarbhavin22@gmail.com instead of using the issue tracker.

## Credits

- [Bhavin Gajjar](https://github.com/bhavingajjar)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
