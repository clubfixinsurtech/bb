<?php

namespace BB\Entities;

use BB\Contracts\{HasPayloadInterface, SlipInterface};
use BB\Helpers\RequiredFields;
use BB\Traits\{ConditionableTrait, HasPayload};

class Slip implements HasPayloadInterface, SlipInterface
{
    use HasPayload, ConditionableTrait;

    protected array $required = [
        'indicadorSituacao',
        'agenciaBeneficiario',
        'contaBeneficiario',
    ];

    public function __construct(
        private string $indicadorSituacao,
        private int    $agenciaBeneficiario,
        private int    $contaBeneficiario,
    )
    {
        $this->validate();
    }

    public function validate(): void
    {
        RequiredFields::check($this->required, $this);
        $this->validateIndicadorSituacao($this->indicadorSituacao);
        $this->validateAgenciaBeneficiario($this->agenciaBeneficiario);
        $this->validateContaBeneficiario($this->contaBeneficiario);
    }

    public function getRequired(): array
    {
        return $this->required;
    }

    public function setRequired(array $required): Slip
    {
        $this->required = $required;
        return $this;
    }

    public function getIndicadorSituacao(): string
    {
        return $this->indicadorSituacao;
    }

    public function setIndicadorSituacao(string $indicadorSituacao): Slip
    {
        $this->indicadorSituacao = $indicadorSituacao;
        return $this;
    }

    public function getAgenciaBeneficiario(): int
    {
        return $this->agenciaBeneficiario;
    }

    public function setAgenciaBeneficiario(int $agenciaBeneficiario): Slip
    {
        $this->agenciaBeneficiario = $agenciaBeneficiario;
        return $this;
    }

    public function getContaBeneficiario(): int
    {
        return $this->contaBeneficiario;
    }

    public function setContaBeneficiario(int $contaBeneficiario): Slip
    {
        $this->contaBeneficiario = $contaBeneficiario;
        return $this;
    }

    private function validateIndicadorSituacao(string $indicadorSituacao): void
    {
        if (!preg_match('/^[A-Z]+$/', $indicadorSituacao)) {
            throw new \InvalidArgumentException('The key indicadorSituacao must be uppercase');
        }
    }

    private function validateAgenciaBeneficiario(int $agenciaBeneficiario): void
    {
        // TODO: Implement validateAgenciaBeneficiario() method.
    }

    private function validateContaBeneficiario(int $contaBeneficiario): void
    {
        // TODO: Implement validateContaBeneficiario() method.
    }
}