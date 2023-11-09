<?php

namespace BB\Strategies;

use BB\Contracts\PixInterface;
use BB\Entities\Paginacao;
use BB\Helpers\{PropertyValidator, RequiredFields, Validator};
use BB\Traits\{ConditionableTrait, HasPayload};

class PixListStrategy implements PixInterface
{
    use HasPayload, ConditionableTrait;

    protected array $required = [
        'inicio',
        'fim',
    ];

    private ?string $cpf = null;
    private ?string $cnpj = null;
    private ?bool $locationPresente = null;
    private ?string $status = null;
    private ?int $loteCobVId = null;
    private ?array $paginacao = null;

    public function __construct(
        private string $inicio,
        private string $fim,
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

    public function getInicio(): string
    {
        return $this->inicio;
    }

    public function setInicio(string $inicio): self
    {
        $this->inicio = $inicio;
        $this->validate();
        return $this;
    }

    public function getFim(): string
    {
        return $this->fim;
    }

    public function setFim(string $fim): self
    {
        $this->fim = $fim;
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

    public function getLocationPresente(): ?bool
    {
        return $this->locationPresente;
    }

    public function setLocationPresente(bool $locationPresente): self
    {
        $this->locationPresente = $locationPresente;
        $this->validate();
        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;
        $this->validate();
        return $this;
    }

    public function getLoteCobVId(): ?int
    {
        return $this->loteCobVId;
    }

    public function setLoteCobVId(int $loteCobVId): self
    {
        $this->loteCobVId = $loteCobVId;
        $this->validate();
        return $this;
    }

    public function getPaginacao(): ?array
    {
        return $this->paginacao;
    }

    public function setPaginacao(Paginacao $paginacao): self
    {
        $this->paginacao = $paginacao->payload();
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
}