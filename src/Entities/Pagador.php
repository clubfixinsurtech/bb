<?php

namespace BB\Entities;

use BB\Contracts\HasPayloadInterface;
use BB\Enums\TipoInscricao;
use BB\Helpers\{PropertyValidator, RequiredFields, Validator};
use BB\Traits\{ConditionableTrait, HasPayload};

class Pagador implements HasPayloadInterface
{
    use HasPayload, ConditionableTrait;

    protected array $required = [
        'tipoInscricao',
        'numeroInscricao',
    ];

    public function __construct(
        private TipoInscricao $tipoInscricao,
        private int           $numeroInscricao,
        private ?string       $nome = null,
        private ?string       $endereco = null,
        private ?string       $cep = null,
        private ?string       $cidade = null,
        private ?string       $bairro = null,
        private ?string       $uf = null,
        private ?string       $telefone = null,
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

    public function getTipoInscricao(): int
    {
        return $this->tipoInscricao;
    }

    public function setTipoInscricao(int $tipoInscricao): self
    {
        $this->tipoInscricao = $tipoInscricao;
        return $this;
    }

    public function getNumeroInscricao(): int
    {
        return $this->numeroInscricao;
    }

    public function setNumeroInscricao(int $numeroInscricao): self
    {
        $this->numeroInscricao = $numeroInscricao;
        return $this;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(?string $nome): self
    {
        $this->nome = $nome;
        return $this;
    }

    public function getEndereco(): ?string
    {
        return $this->endereco;
    }

    public function setEndereco(?string $endereco): self
    {
        $this->endereco = $endereco;
        return $this;
    }

    public function getCep(): ?string
    {
        return $this->cep;
    }

    public function setCep(?string $cep): self
    {
        $this->cep = $cep;
        return $this;
    }

    public function getCidade(): ?string
    {
        return $this->cidade;
    }

    public function setCidade(?string $cidade): self
    {
        $this->cidade = $cidade;
        return $this;
    }

    public function getBairro(): ?string
    {
        return $this->bairro;
    }

    public function setBairro(?string $bairro): self
    {
        $this->bairro = $bairro;
        return $this;
    }

    public function getUf(): ?string
    {
        return $this->uf;
    }

    public function setUf(?string $uf): self
    {
        $this->uf = $uf;
        return $this;
    }

    public function getTelefone(): ?string
    {
        return $this->telefone;
    }

    public function setTelefone(?string $telefone): self
    {
        $this->telefone = $telefone;
        return $this;
    }

    private function validateUf(): void
    {
        if ($this->uf) {
            if (!Validator::uf($this->uf)) {
                throw new \InvalidArgumentException('UF Inválida');
            }
        }
    }
}