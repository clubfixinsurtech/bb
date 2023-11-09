<?php

namespace BB\Entities;

use BB\Contracts\HasPayloadInterface;
use BB\Enums\MultaTipo;
use BB\Helpers\{PropertyValidator, RequiredFields, Validator};
use BB\Traits\{ConditionableTrait, HasPayload};

class Multa implements HasPayloadInterface
{
    use HasPayload, ConditionableTrait;

    protected array $required = [];

    public function __construct(
        private MultaTipo $tipo,
        private float     $porcentagem,
        private float     $valor,
    )
    {
        $this->validate();
    }

    public function validate(): void
    {
        RequiredFields::check($this->required, $this);
        PropertyValidator::validate($this);
    }

    public function getRequired(): array
    {
        return $this->required;
    }

    public function setRequired(array $required): self
    {
        $this->required = $required;
        return $this;
    }

    public function getTipo(): MultaTipo
    {
        return $this->tipo;
    }

    public function setTipo(MultaTipo $tipo): self
    {
        $this->tipo = $tipo;
        $this->validate();
        return $this;
    }

    public function getPorcentagem(): float
    {
        return $this->porcentagem;
    }

    public function setPorcentagem(float $porcentagem): self
    {
        $this->porcentagem = $porcentagem;
        $this->validate();
        return $this;
    }

    public function getValor(): float
    {
        return $this->valor;
    }

    public function setValor(float $valor): self
    {
        $this->valor = $valor;
        $this->validate();
        return $this;
    }

    private function validatePorcentagem(): void
    {
        if (!Validator::decimal($this->porcentagem)) {
            throw new \InvalidArgumentException('Porcentagem Inválida');
        }
    }

    private function validateValor(): void
    {
        if (!Validator::decimal($this->valor)) {
            throw new \InvalidArgumentException('Valor Inválido');
        }
    }
}