<?php

namespace BB\Entities;

class GetBillets
{
    private const REQUIRED = [
        'indicadorSituacao',
        'agenciaBeneficiario',
        'contaBeneficiario',
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
        $this->validateIndicadorSituacao($options);
        $this->validateAgenciaBeneficiario($options);
        $this->validateContaBeneficiario($options);
    }

    private function validateRequired(array $options): void
    {
        array_filter(self::REQUIRED, function (string $key) use ($options) {
            if (!array_key_exists($key, $options)) {
                throw new \InvalidArgumentException("The key {$key} is required");
            }
        });
    }

    private function validateIndicadorSituacao(array $options): void
    {
        if (!is_string($options['indicadorSituacao'])) {
            throw new \InvalidArgumentException('The key indicadorSituacao must be a string');
        }

        if (!preg_match('/^[A-Z]+$/', $options['indicadorSituacao'])) {
            throw new \InvalidArgumentException('The key indicadorSituacao must be uppercase');
        }
    }

    private function validateAgenciaBeneficiario(array $options): void
    {
        if (!is_int($options['agenciaBeneficiario'])) {
            throw new \InvalidArgumentException('The key agenciaBeneficiario must be a integer');
        }
    }

    private function validateContaBeneficiario(array $options): void
    {
        if (!is_int($options['contaBeneficiario'])) {
            throw new \InvalidArgumentException('The key contaBeneficiario must be a integer');
        }
    }
}