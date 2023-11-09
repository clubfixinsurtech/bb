<?php

namespace BB\Entities;

use BB\Contracts\HasPayloadInterface;
use BB\Enums\ModalidadeDescontosAplicados;
use BB\Helpers\{PropertyValidator, RequiredFields};
use BB\Traits\{ConditionableTrait, HasPayload};

class DescontosAplicados implements HasPayloadInterface
{
    use HasPayload, ConditionableTrait;

    protected array $required = [
        'modalidade',
    ];

    private ?array $descontoDataFixa = null;
    private ?string $valorPerc = null;

    public function __construct(
        private ModalidadeDescontosAplicados $modalidade,
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

    public function getModalidade(): ModalidadeDescontosAplicados
    {
        return $this->modalidade;
    }

    public function setModalidade(ModalidadeDescontosAplicados $modalidade): self
    {
        $this->modalidade = $modalidade;
        $this->validate();
        return $this;
    }

    public function getDescontoDataFixa(): ?array
    {
        return $this->descontoDataFixa;
    }

    public function setDescontoDataFixa(DescontoDataFixa $descontoDataFixa): self
    {
        $this->descontoDataFixa[] = $descontoDataFixa->payload();
        $this->validate();
        return $this;
    }

    public function getValorPerc(): ?string
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
        if ($this->valorPerc) {
            if (!preg_match('/^\d{1,10}\.\d{2}$/', $this->valorPerc)) {
                throw new \InvalidArgumentException('O valor do abatimento deve ser um número decimal com duas casas decimais.');
            }
        }
    }
}