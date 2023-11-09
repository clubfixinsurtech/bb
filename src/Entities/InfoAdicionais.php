<?php

namespace BB\Entities;

use BB\Contracts\HasPayloadInterface;
use BB\Helpers\{PropertyValidator, RequiredFields};
use BB\Traits\{ConditionableTrait, HasPayload};

class InfoAdicionais implements HasPayloadInterface
{
    use HasPayload, ConditionableTrait;

    protected array $required = [
        'nome',
        'valor',
    ];

    public function __construct(
        private string $nome,
        private string $valor,
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

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;
        $this->validate();
        return $this;
    }

    public function getValor(): string
    {
        return $this->valor;
    }

    public function setValor(string $valor): self
    {
        $this->valor = $valor;
        $this->validate();
        return $this;
    }

    private function validateNome(): void
    {
        if (strlen($this->nome) > 50) {
            throw new \InvalidArgumentException('Nome deve ter no máximo 50 caracteres');
        }
    }

    private function validateValor(): void
    {
        if (strlen($this->valor) > 200) {
            throw new \InvalidArgumentException('Valor deve ter no máximo 200 caracteres');
        }
    }
}