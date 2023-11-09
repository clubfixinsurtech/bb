<?php

namespace BB\Helpers;

use Respect\Validation\Validator as v;

class PixKeyValidator
{
    public static function validatePixKey(string $key): void
    {
        if (
            !self::isValidEmail($key) &&
            !self::isValidCPF($key) &&
            !self::isValidCNPJ($key) &&
            !self::isValidRandomKey($key) &&
            !self::isValidPhoneNumber($key)
        ) {
            throw new \InvalidArgumentException('Invalid Pix Key Format');
        }
    }

    protected static function isValidEmail(string $key): bool
    {
        return v::email()->validate($key);
    }

    protected static function isValidCPF(string $key): bool
    {
        return Validator::cpf($key);
    }

    protected static function isValidCNPJ(string $key): bool
    {
        return Validator::cnpj($key);
    }

    protected static function isValidPhoneNumber(string $key): bool
    {
        return preg_match('/^\+55\d{10,11}$/', $key) === 1;
    }

    protected static function isValidRandomKey(string $key): bool
    {
        return Validator::uuid($key);
    }
}
