# Banco do Brasil @ClubFix

[![Maintainer](http://img.shields.io/badge/maintainer-@clubfixinsurtech-blue.svg?style=flat-square)](https://twitter.com/WilderAmorim)
[![Source Code](http://img.shields.io/badge/source-clubfixinsurtech/bb-blue.svg?style=flat-square)](https://github.com/clubfixinsurtech/bb)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/clubfixinsurtech/bb.svg?style=flat-square)](https://packagist.org/packages/clubfixinsurtech/bb)
[![Latest Version](https://img.shields.io/github/release/clubfixinsurtech/bb.svg?style=flat-square)](https://github.com/clubfixinsurtech/bb/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Build](https://img.shields.io/scrutinizer/build/g/clubfixinsurtech/bb.svg?style=flat-square)](https://scrutinizer-ci.com/g/clubfixinsurtech/bb)
[![Quality Score](https://img.shields.io/scrutinizer/g/clubfixinsurtech/bb.svg?style=flat-square)](https://scrutinizer-ci.com/g/clubfixinsurtech/bb)
[![Total Downloads](https://img.shields.io/packagist/dt/clubfixinsurtech/bb.svg?style=flat-square)](https://packagist.org/packages/clubfixinsurtech/bb)

###### Integration with the BB payment gateway.

Integração com o Gateway de Pagamento Banco do Brasil.

### Highlights

- Simple installation (Instalação simples)
- Composer ready and PSR-2 compliant (Pronto para o composer e compatível com PSR-2)

## Installation

Banco do Brasil is available via Composer:

```bash
composer require clubfixinsurtech/bb
```

## Documentation

###### For more details on how to use it, see the "examples" folder in the component's directory. It contains an example of how to use the class. It works as follows:

Para obter mais detalhes sobre como utilizar, consulte a pasta "examples" no diretório do componente. Nela, haverá um exemplo de utilização da classe. O funcionamento é o seguinte:

##### Basic Usage:

```php
<?php

$clientId = '';
$clientSecret = '';
$developerApplicationKey = '';
$isSandbox = true;

$connector = new \BB\BBConnector(
    clientId: $clientId,
    clientSecret: $clientSecret,
    developerApplicationKey: $developerApplicationKey,
    isSandbox: $isSandbox,
);

// Create slip
$request = $connector->bb()->slipCreate(
    new \BB\Entities\CreateSlip(
        numeroConvenio: 123456789,
        dataVencimento: (new \DateTime())->format('d.m.Y'),
        valorOriginal: 100.99,
    ),
);
$response = $request->object();

dump($request, $response);
```

## Credits

- [Clubfix](https://clubfix.com.br) (Team)

## License

The MIT License (MIT). Please see [License File](https://github.com/clubfixinsurtech/bb/blob/master/LICENSE) for more information.