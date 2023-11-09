<?php

namespace BB\Entities;

use BB\Contracts\HasPayloadInterface;
use BB\Enums\ModalidadeMultaAplicada;
use BB\Helpers\{PropertyValidator, RequiredFields};
use BB\Traits\{ConditionableTrait, HasPayload};

class MultaAplicada implements HasPayloadInterface
{
    use HasPayload, ConditionableTrait;

    protected array $required = [
        'modalidade',
        'valorPerc',
    ];

    public function __construct(
        private ModalidadeMultaAplicada $modalidade,
        private string                  $valorPerc,
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

    public function getModalidade(): ModalidadeMultaAplicada
    {
        return $this->modalidade;
    }

    public function setModalidade(ModalidadeMultaAplicada $modalidade): self
    {
        $this->modalidade = $modalidade;
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

    private function validateValorPerc(): void
    {
        if (!preg_match('/^\d{1,10}\.\d{2}$/', $this->valorPerc)) {
            throw new \InvalidArgumentException('O valor do abatimento deve ser um número decimal com duas casas decimais.');
        }
    }
}