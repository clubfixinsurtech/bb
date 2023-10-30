<?php

namespace BB\Entities;

class CreateBillet
{
    private const REQUIRED = [
        'numeroConvenio',
        'dataVencimento',
        'valorOriginal',
    ];

    public function __construct(protected array $options)
    {
        $this->validate($options);
    }

    public function toArray(): array
    {
        return $this->options;
    }

    private function validate(array $options): void
    {
        $this->validateRequired($options);
        $this->validateNumeroConvenio($options);
        $this->validateDataVencimento($options);
        $this->validateValorOriginal($options);
    }

    private function validateRequired(array $options): void
    {
        array_filter(self::REQUIRED, function (string $key) use ($options) {
            if (!array_key_exists($key, $options)) {
                throw new \InvalidArgumentException("The key {$key} is required");
            }
        });
    }

    private function validateNumeroConvenio(array $options): void
    {
        if (!is_int($options['numeroConvenio'])) {
            throw new \InvalidArgumentException('The numeroConvenio must be an integer');
        }
    }

    private function validateDataVencimento(array $options): void
    {
        if (!is_string($options['dataVencimento'])) {
            throw new \InvalidArgumentException('The dataVencimento must be a string');
        }

        if (!preg_match('/^\d{2}\.\d{2}\.\d{4}$/', $options['dataVencimento'])) {
            throw new \InvalidArgumentException('The dataVencimento should be in the format dd.mm.yyyy');
        }
    }

    private function validateValorOriginal(array $options): void
    {
        if (!is_float($options['valorOriginal'])) {
            throw new \InvalidArgumentException('The valorOriginal must be a float');
        }

        if ($options['valorOriginal'] <= 0) {
            throw new \InvalidArgumentException('The valorOriginal must be greater than 0');
        }

        if (!preg_match('/^\d+(\.\d{2})?$/', $options['valorOriginal'])) {
            throw new \InvalidArgumentException('The valorOriginal must be in the format 0.00 (decimal separated by ".").');
        }
    }
}