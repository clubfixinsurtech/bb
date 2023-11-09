<?php

namespace BB\Entities;

final class Txid
{
    private string $txid;

    public function __construct(string $txid)
    {
        $min = \BB\Helpers\Txid::MIN_LENGTH;
        $max = \BB\Helpers\Txid::MAX_LENGTH;

        if (strlen($txid) < $min || strlen($txid) > $max) {
            throw new \InvalidArgumentException(
                sprintf('Txid must be between %d and %d characters long.', $min, $max)
            );
        }

        if (preg_match('/[^a-zA-Z0-9]/', $txid)) {
            throw new \InvalidArgumentException('Txid must contain only letters and numbers.');
        }

        $this->txid = $txid;
    }

    public function __toString(): string
    {
        return $this->txid;
    }
}