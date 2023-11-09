<?php

namespace BB\Entities;

use BB\Contracts\HasPayloadInterface;
use BB\Helpers\{PropertyValidator, RequiredFields, Validator};
use BB\Traits\{ConditionableTrait, HasPayload};

class Calendario implements HasPayloadInterface
{
    use HasPayload, ConditionableTrait;

    protected array $required = [];

    public function __construct(
        private ?int    $expiracao = null,
        private ?string $dataDeVencimento = null,
        private ?int    $validadeAposVencimento = null,
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

    public function getExpiracao(): ?int
    {
        return $this->expiracao;
    }

    public function setExpiracao(int $expiracao): self
    {
        $this->expiracao = $expiracao;
        $this->validate();
        return $this;
    }

    public function getDataDeVencimento(): ?string
    {
        return $this->dataDeVencimento;
    }

    public function setDataDeVencimento(string $dataDeVencimento): self
    {
        $this->dataDeVencimento = $dataDeVencimento;
        $this->validate();
        return $this;
    }

    public function getValidadeAposVencimento(): ?int
    {
        return $this->validadeAposVencimento;
    }

    public function setValidadeAposVencimento(int $validadeAposVencimento): self
    {
        $this->validadeAposVencimento = $validadeAposVencimento;
        $this->validate();
        return $this;
    }

    private function validateDataDeVencimento(): void
    {
        if ($this->dataDeVencimento) {
            if (!Validator::date($this->dataDeVencimento)) {
                throw new \InvalidArgumentException(sprintf('Invalid date format for dataDeVencimento: %s', $this->dataDeVencimento));
            }
        }
    }
}