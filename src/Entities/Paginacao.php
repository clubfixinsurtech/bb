<?php

namespace BB\Entities;

use BB\Contracts\HasPayloadInterface;
use BB\Helpers\{PropertyValidator, RequiredFields};
use BB\Traits\{ConditionableTrait, HasPayload};

class Paginacao implements HasPayloadInterface
{
    use HasPayload, ConditionableTrait;

    protected array $required = [
        'paginaAtual',
        'itensPorPagina',
    ];

    private ?int $quantidadeDePaginas = null;
    private ?int $quantidadeTotalDeItens = null;

    public function __construct(
        private int $paginaAtual,
        private int $itensPorPagina,
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

    public function getPaginaAtual(): int
    {
        return $this->paginaAtual;
    }

    public function setPaginaAtual(int $paginaAtual): self
    {
        $this->paginaAtual = $paginaAtual;
        $this->validate();
        return $this;
    }

    public function getItensPorPagina(): int
    {
        return $this->itensPorPagina;
    }

    public function setItensPorPagina(int $itensPorPagina): self
    {
        $this->itensPorPagina = $itensPorPagina;
        $this->validate();
        return $this;
    }

    public function getQuantidadeDePaginas(): ?int
    {
        return $this->quantidadeDePaginas;
    }

    public function setQuantidadeDePaginas(int $quantidadeDePaginas): self
    {
        $this->quantidadeDePaginas = $quantidadeDePaginas;
        $this->validate();
        return $this;
    }

    public function getQuantidadeTotalDeItens(): ?int
    {
        return $this->quantidadeTotalDeItens;
    }

    public function setQuantidadeTotalDeItens(int $quantidadeTotalDeItens): self
    {
        $this->quantidadeTotalDeItens = $quantidadeTotalDeItens;
        $this->validate();
        return $this;
    }
}