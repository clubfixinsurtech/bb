<?php

namespace BB\Helpers;

use BB\Exceptions\ValidatorException;
use Respect\Validation\Validator as v;

class Validator
{
    public static function email(string $email): void
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw (new ValidatorException('E-mail Inválido'))->addField('email');
        }
    }


    public static function ip(string $ip): void
    {
        if (!filter_var($ip, FILTER_VALIDATE_IP)) {
            throw (new ValidatorException('IP Inválido'))->addField('remoteIp');
        }
    }

    public static function isEnum($object): bool
    {
        return is_object($object) && (new \ReflectionClass($object))->isEnum();
    }

    public static function cpf(string $input): bool
    {
        return v::digit()->cpf()->validate($input);
    }

    public static function cnpj(string $input): bool
    {
        return v::digit()->cnpj()->validate($input);
    }

    public static function date(string $input, string $format = 'Y-m-d'): bool
    {
        return v::date($format)->validate($input);
    }

    public static function decimal(float $input, int $decimals = 2): bool
    {
        return v::decimal($decimals)->validate($input);
    }

    public static function uuid(string $input): bool
    {
        return v::uuid()->validate($input);
    }

    public static function uf(string $input): bool
    {
        return in_array($input, [
            'AC', 'AL', 'AM', 'AP', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA',
            'MG', 'MS', 'MT', 'PA', 'PB', 'PE', 'PI', 'PR', 'RJ', 'RN',
            'RO', 'RR', 'RS', 'SC', 'SE', 'SP', 'TO'
        ]);
    }
}
