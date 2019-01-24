# changelly

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Style CI][ico-styleci]][link-styleci]
[![Code Coverage][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

A PHP wrapper for the [Changelly] API.

## Structure

```
src/
tests/
vendor/
```

## Install

Via Composer

```bash
$ composer require pxgamer/changelly
```

## Usage

**Creating instances**

```php
use pxgamer\Changelly\{Currencies,Transactions,Message};

$currencies = new Currencies();
$transactions = new Transactions();
```

**Retrieve an array of currency names**

Retrieve an array of strings stating the `name` of the currency.

```php
$currencies->get();
```

**Retrieve an array of currency `stdClass` instances**

These contain the following information:

- name
- fullName
- enabled

```php
$currencies->getFull();
```

**Retrieve the minimum amount required to convert between 2 currencies**

```php
$currencies->minimumAmount('btc', 'etc');
```

**Retrieve the estimated exchange value between 2 currencies**

```php
$currencies->exchangeAmount('btc', 'etc', 1.0);
```

**Retrieve an array of transactions**

Returns an array of transaction `stdClass` instances containing the following values:

- id
- createdAt
- payinConfirmations
- status
- currencyFrom
- currencyTo

```php
$transactions->get();
```

**Retrieve a single transaction's status by ID**

Returns a transaction status string.

```php
$transactions->status('id');
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

```bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) and [CODE_OF_CONDUCT](.github/CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email security@pxgamer.xyz instead of using the issue tracker.

## Credits

- [pxgamer][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[changelly]: https://changelly.com

[ico-version]: https://img.shields.io/packagist/v/pxgamer/changelly.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/pxgamer/changelly/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/114899505/shield
[ico-code-quality]: https://img.shields.io/codecov/c/github/pxgamer/changelly.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/pxgamer/changelly.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/pxgamer/changelly
[link-travis]: https://travis-ci.org/pxgamer/changelly
[link-styleci]: https://styleci.io/repos/114899505
[link-code-quality]: https://codecov.io/gh/pxgamer/changelly
[link-downloads]: https://packagist.org/packages/pxgamer/changelly
[link-author]: https://github.com/pxgamer
[link-contributors]: ../../contributors
