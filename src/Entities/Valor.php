<?php

namespace BB\Entities;

use BB\Contracts\HasPayloadInterface;
use BB\Helpers\{PropertyValidator, RequiredFields, Validator};
use BB\Traits\{ConditionableTrait, HasPayload};

class Valor implements HasPayloadInterface
{
    use HasPayload, ConditionableTrait;

    protected array $required = [
        'original',
    ];

    private ?array $multa = null;
    private ?array $juros = null;
    private ?array $abatimento = null;
    private ?array $desconto = null;

    public function __construct(
        private float $original,
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

    public function getOriginal(): float
    {
        return $this->original;
    }

    public function setOriginal(string $original): self
    {
        $this->original = $original;
        $this->validate();
        return $this;
    }

    public function getMulta(): ?array
    {
        return $this->multa;
    }

    public function setMulta(MultaAplicada $multa): self
    {
        $this->multa = $multa->payload();
        $this->validate();
        return $this;
    }

    public function getJuros(): ?array
    {
        return $this->juros;
    }

    public function setJuros(JuroAplicado $juros): self
    {
        $this->juros = $juros->payload();
        $this->validate();
        return $this;
    }

    public function getAbatimento(): ?array
    {
        return $this->abatimento;
    }

    public function setAbatimento(AbatimentoAplicado $abatimento): self
    {
        $this->abatimento = $abatimento->payload();
        $this->validate();
        return $this;
    }

    public function getDesconto(): ?array
    {
        return $this->desconto;
    }

    public function setDesconto(DescontosAplicados $desconto): self
    {
        $this->desconto = $desconto->payload();
        $this->validate();
        return $this;
    }

    private function validateOriginal(): void
    {
        if (!Validator::decimal($this->original)) {
            throw new \InvalidArgumentException('Valor Inválido');
        }
    }
}