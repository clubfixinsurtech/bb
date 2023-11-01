<?php

namespace BB\Entities;

use BB\Contracts\{CalendarioInterface, HasPayloadInterface};
use BB\Helpers\RequiredFields;
use BB\Traits\{ConditionableTrait, HasPayload};

class Calendario implements HasPayloadInterface, CalendarioInterface
{
    use HasPayload, ConditionableTrait;

    protected array $required = [
        'expiracao',
    ];

    public function __construct(
        private int $expiracao,
    )
    {
        $this->validate();
    }

    public function validate(): void
    {
        RequiredFields::check($this->required, $this);
    }

    public function getRequired(): array
    {
        return $this->required;
    }

    public function setRequired(array $required): Calendario
    {
        $this->required = $required;
        return $this;
    }

    public function getExpiracao(): int
    {
        return $this->expiracao;
    }

    public function setExpiracao(int $expiracao): Calendario
    {
        $this->expiracao = $expiracao;
        return $this;
    }
}