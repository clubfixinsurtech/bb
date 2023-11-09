<?php

namespace BB\Entities;

use BB\Contracts\HasPayloadInterface;
use BB\Enums\TipoInscricao;
use BB\Helpers\{PropertyValidator, RequiredFields, Validator};
use BB\Traits\{ConditionableTrait, HasPayload};

class BeneficiarioFinal implements HasPayloadInterface
{
    use HasPayload, ConditionableTrait;

    protected array $required = [];

    public function __construct(
        private TipoInscricao $tipoInscricao,
        private int           $numeroInscricao,
        private string        $nome,
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

    public function getTipoInscricao(): TipoInscricao
    {
        return $this->tipoInscricao;
    }

    public function setTipoInscricao(TipoInscricao $tipoInscricao): self
    {
        $this->tipoInscricao = $tipoInscricao;
        $this->validate();
        return $this;
    }

    public function getNumeroInscricao(): int
    {
        return $this->numeroInscricao;
    }

    public function setNumeroInscricao(int $numeroInscricao): self
    {
        $this->numeroInscricao = $numeroInscricao;
        $this->validate();
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

    private function validateNumeroInscricao(): void
    {
        switch ($this->tipoInscricao) {
            case TipoInscricao::CPF:
                if (!Validator::cpf($this->numeroInscricao)) {
                    throw new \InvalidArgumentException('CPF inválido');
                }
                break;
            case TipoInscricao::CNPJ:
                if (!Validator::cnpj($this->numeroInscricao)) {
                    throw new \InvalidArgumentException('CNPJ inválido');
                }
                break;
        }
    }
}