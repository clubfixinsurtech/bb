<?php

namespace BB\Entities;

use BB\Contracts\{HasPayloadInterface, ValorInterface};
use BB\Helpers\RequiredFields;
use BB\Traits\{ConditionableTrait, HasPayload};

class Valor implements HasPayloadInterface, ValorInterface
{
    use HasPayload, ConditionableTrait;

    protected array $required = [
        'original',
    ];

    public function __construct(
        private string $original,
    )
    {
        $this->validate();
    }

    public function validate(): void
    {
        RequiredFields::check($this->required, $this);
        $this->validateOriginal($this->original);
    }

    public function getRequired(): array
    {
        return $this->required;
    }

    public function setRequired(array $required): Valor
    {
        $this->required = $required;
        return $this;
    }

    public function getOriginal(): string
    {
        return $this->original;
    }

    public function setOriginal(string $original): Valor
    {
        $this->original = $original;
        return $this;
    }

    private function validateOriginal(string $original): void
    {
        if (!preg_match('/\d{1,10}\.\d{2}/', $original)) {
            throw new \InvalidArgumentException('The key valor.original must be float');
        }
    }
}