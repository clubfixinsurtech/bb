<?php

namespace BB\Entities;

use BB\Helpers\{PixKeyValidator, RequiredFields};
use BB\Contracts\{CreateImmediateBillingInterface, HasPayloadInterface};
use BB\Traits\{ConditionableTrait, HasPayload};

class CreateImmediateBilling implements HasPayloadInterface, CreateImmediateBillingInterface
{
    use HasPayload, ConditionableTrait;

    protected array $required = [
        'calendario',
        'valor',
        'chave',
    ];

    public function __construct(
        private Calendario $calendario,
        private Valor      $valor,
        private string     $chave,
    )
    {
        $this->validate();
    }

    public function validate(): void
    {
        RequiredFields::check($this->required, $this);
        PixKeyValidator::validatePixKey($this->chave);
    }

    public function getRequired(): array
    {
        return $this->required;
    }

    public function setRequired(array $required): CreateImmediateBilling
    {
        $this->required = $required;
        return $this;
    }

    public function getCalendario(): Calendario
    {
        return $this->calendario;
    }

    public function setCalendario(Calendario $calendario): CreateImmediateBilling
    {
        $this->calendario = $calendario;
        return $this;
    }

    public function getValor(): Valor
    {
        return $this->valor;
    }

    public function setValor(Valor $valor): CreateImmediateBilling
    {
        $this->valor = $valor;
        return $this;
    }

    public function getChave(): string
    {
        return $this->chave;
    }

    public function setChave(string $chave): CreateImmediateBilling
    {
        $this->chave = $chave;
        return $this;
    }
}