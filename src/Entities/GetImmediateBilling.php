<?php

namespace BB\Entities;

use BB\Contracts\{GetImmediateBillingInterface, HasPayloadInterface};
use BB\Helpers\RequiredFields;
use BB\Traits\{ConditionableTrait, HasPayload};

class GetImmediateBilling implements HasPayloadInterface, GetImmediateBillingInterface
{
    use HasPayload, ConditionableTrait;

    protected array $required = [
        'inicio',
        'fim',
    ];

    public function __construct(
        private string $inicio,
        private string $fim,
    )
    {
        $this->validate();
    }

    public function validate(): void
    {
        RequiredFields::check($this->required, $this);
        $this->validateDateTime($this->inicio, 'inicio');
        $this->validateDateTime($this->fim, 'fim');
    }

    public function getRequired(): array
    {
        return $this->required;
    }

    public function setRequired(array $required): GetImmediateBilling
    {
        $this->required = $required;
        return $this;
    }

    public function getInicio(): string
    {
        return $this->inicio;
    }

    public function setInicio(string $inicio): GetImmediateBilling
    {
        $this->inicio = $inicio;
        return $this;
    }

    public function getFim(): string
    {
        return $this->fim;
    }

    public function setFim(string $fim): GetImmediateBilling
    {
        $this->fim = $fim;
        return $this;
    }

    private function validateDateTime(string $dateTime, string $field): void
    {
        if (!preg_match('/^(\d{4})-(\d{2})-(\d{2})T(\d{2}):(\d{2}):(\d{2})Z$/', $dateTime)) {
            throw new \InvalidArgumentException("The {$field} should be in the format yyyy-mm-ddThh:mm:ssZ");
        }
    }
}