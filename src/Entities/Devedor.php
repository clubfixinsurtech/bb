<?php

namespace BB\Entities;

use BB\Contracts\HasPayloadInterface;
use BB\Helpers\{PropertyValidator, RequiredFields, Validator};
use BB\Traits\{ConditionableTrait, HasPayload};

class Devedor implements HasPayloadInterface
{
    use HasPayload, ConditionableTrait;

    protected array $required = [
        'nome'
    ];

    public function __construct(
        private string  $nome,
        private ?string $cpf = null,
        private ?string $cnpj = null,
        private ?string $logradouro = null,
        private ?string $cidade = null,
        private ?string $uf = null,
        private ?string $cep = null,
        private ?string $email = null,
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

    public function getCpf(): ?string
    {
        return $this->cpf;
    }

    public function setCpf(string $cpf): self
    {
        $this->cpf = $cpf;
        $this->validate();
        return $this;
    }

    public function getCnpj(): ?string
    {
        return $this->cnpj;
    }

    public function setCnpj(string $cnpj): self
    {
        $this->cnpj = $cnpj;
        $this->validate();
        return $this;
    }

    public function getLogradouro(): ?string
    {
        return $this->logradouro;
    }

    public function setLogradouro(string $logradouro): self
    {
        $this->logradouro = $logradouro;
        $this->validate();
        return $this;
    }

    public function getCidade(): ?string
    {
        return $this->cidade;
    }

    public function setCidade(string $cidade): self
    {
        $this->cidade = $cidade;
        $this->validate();
        return $this;
    }

    public function getUf(): ?string
    {
        return $this->uf;
    }

    public function setUf(string $uf): self
    {
        $this->uf = $uf;
        $this->validate();
        return $this;
    }

    public function getCep(): ?string
    {
        return $this->cep;
    }

    public function setCep(string $cep): self
    {
        $this->cep = $cep;
        $this->validate();
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        $this->validate();
        return $this;
    }

    private function validateCpf(): void
    {
        if ($this->cpf) {
            if (!Validator::cpf($this->cpf)) {
                throw new \InvalidArgumentException(sprintf('CPF inválido: %s', $this->cpf));
            }
        }
    }

    private function validateCnpj(): void
    {
        if ($this->cnpj) {
            if (!Validator::cnpj($this->cnpj)) {
                throw new \InvalidArgumentException(sprintf('CNPJ inválido: %s', $this->cnpj));
            }
        }
    }

    private function validateUf(): void
    {
        if ($this->uf) {
            if (!Validator::uf($this->uf)) {
                throw new \InvalidArgumentException(sprintf('UF inválido: %s', $this->uf));
            }
        }
    }

    private function validateEmail(): void
    {
        if ($this->email) {
            Validator::email($this->email);
        }
    }
}