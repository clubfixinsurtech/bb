<?php

namespace BB\Entities;

use BB\Contracts\HasPayloadInterface;
use BB\Enums\DescontoTipo;
use BB\Helpers\{PropertyValidator, RequiredFields, Validator};
use BB\Traits\{ConditionableTrait, HasPayload};

class Desconto implements HasPayloadInterface
{
    use HasPayload, ConditionableTrait;

    protected array $required = [];

    public function __construct(
        private string        $dataExpiracao,
        private float         $porcentagem,
        private float         $valor,
        private ?DescontoTipo $tipo = null,
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

    public function getDataExpiracao(): string
    {
        return $this->dataExpiracao;
    }

    public function setDataExpiracao(string $dataExpiracao): self
    {
        $this->dataExpiracao = $dataExpiracao;
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

    public function getTipo(): ?DescontoTipo
    {
        return $this->tipo;
    }

    public function setTipo(DescontoTipo $tipo): self
    {
        $this->tipo = $tipo;
        $this->validate();
        return $this;
    }

    private function validateDataExpiracao(): void
    {
        if (!Validator::date($this->dataExpiracao, 'd.m.Y')) {
            throw new \InvalidArgumentException('Data de Expiração Inválida');
        }
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