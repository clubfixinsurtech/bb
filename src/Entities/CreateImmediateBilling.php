<?php

namespace BB\Entities;

class CreateImmediateBilling
{
    private const REQUIRED = [
        'calendario',
        'valor',
        'chave',
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
        $this->validateCalendario($options);
        $this->validateValor($options);
    }

    private function validateRequired(array $options): void
    {
        array_filter(self::REQUIRED, function (string $key) use ($options) {
            if (!array_key_exists($key, $options)) {
                throw new \InvalidArgumentException("The key {$key} is required");
            }
        });
    }

    private function validateCalendario(array $options): void
    {
        if (!isset($options['calendario']['expiracao'])) {
            throw new \InvalidArgumentException('The key calendario.expiracao is required');
        }

        if (!is_int($options['calendario']['expiracao'])) {
            throw new \InvalidArgumentException('The key calendario.expiracao must be integer');
        }
    }

    private function validateValor(array $options): void
    {
        if (!preg_match('/\d{1,10}\.\d{2}/', $options['valor']['original'])) {
            throw new \InvalidArgumentException('The key valor.original must be float');
        }
    }
}