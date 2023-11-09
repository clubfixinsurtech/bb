<?php

namespace BB\Helpers;

class Txid
{
    public const MIN_LENGTH = 26;
    public const MAX_LENGTH = 35;

    public static function generate(): string
    {
        return self::generateRandomAlphanumericString(self::MIN_LENGTH, self::MAX_LENGTH);
    }

    protected static function generateRandomAlphanumericString(int $minLength, int $maxLength): string
    {
        $length = random_int($minLength, $maxLength);
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);

        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }

        return $randomString;
    }
}