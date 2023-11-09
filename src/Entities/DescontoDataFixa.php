<?php

namespace BB\Entities;

use BB\Contracts\HasPayloadInterface;
use BB\Helpers\{PropertyValidator, RequiredFields, Validator};
use BB\Traits\{ConditionableTrait, HasPayload};

class DescontoDataFixa implements HasPayloadInterface
{
    use HasPayload, ConditionableTrait;

    protected array $required = [
        'data',
        'valorPerc',
    ];

    public function __construct(
        private string $data,
        private string $valorPerc,
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

    public function getData(): string
    {
        return $this->data;
    }

    public function setData(string $data): self
    {
        $this->data = $data;
        $this->validate();
        return $this;
    }

    public function getValorPerc(): string
    {
        return $this->valorPerc;
    }

    public function setValorPerc(string $valorPerc): self
    {
        $this->valorPerc = $valorPerc;
        $this->validate();
        return $this;
    }

    private function validateData(): void
    {
        if (!Validator::date($this->data)) {
            throw new \InvalidArgumentException('A data do desconto deve ser uma data válida.');
        }
    }

    private function validateValorPerc(): void
    {
        if (!preg_match('/^\d{1,10}\.\d{2}$/', $this->valorPerc)) {
            throw new \InvalidArgumentException('O valor do abatimento deve ser um número decimal com duas casas decimais.');
        }
    }
}