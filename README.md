# Laravel Selenium

[![Latest Stable Version](https://poser.pugx.org/pelletiermaxime/laravel-selenium/v/stable.svg)](link-packagist)
[![Latest Unstable Version](https://poser.pugx.org/pelletiermaxime/laravel-selenium/v/unstable.svg)](link-packagist)
[![Software License][ico-license]](LICENSE.md)
<!-- [![Coverage Status][ico-scrutinizer]][link-scrutinizer] -->
<!-- [![Quality Score][ico-code-quality]][link-code-quality] -->
[![Total Downloads][ico-downloads]][link-downloads]

This package contains helpers to setup Selenium for Laravel and eventually will try to replicate the complete API
of the InteractsWithPages trait of Laravel to have a great fluent API and to be able to use tools
like [Laravel TestTools][link-testtools] while still having all the flexibility of Selenium
and to test Javascript applications.

## Usage

### Install via Composer

``` bash
$ composer require pelletiermaxime/laravel-selenium --dev
```

### Add the Service Provider in app.php

```php
Pelletiermaxime\LaravelSelenium\LaravelSeleniumServiceProvider::class,
```

### Use the artisan commands

```bash
php artisan selenium:download
```

Automatically download the Selenium Server jar file and Chromedriver

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Credits

- [Maxime Pelletier][link-author]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/pelletiermaxime/laravel-selenium/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/pelletiermaxime/laravel-selenium.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/pelletiermaxime/laravel-selenium.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/pelletiermaxime/laravel-selenium.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/pelletiermaxime/laravel-selenium
[link-travis]: https://travis-ci.org/pelletiermaxime/laravel-selenium
[link-scrutinizer]: https://scrutinizer-ci.com/g/pelletiermaxime/laravel-selenium/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/pelletiermaxime/laravel-selenium
[link-downloads]: https://packagist.org/packages/pelletiermaxime/laravel-selenium
[link-author]: https://github.com/pelletiermaxime
[link-testtools]: https://chrome.google.com/webstore/detail/laravel-testtools/ddieaepnbjhgcbddafciempnibnfnakl?hl=en
