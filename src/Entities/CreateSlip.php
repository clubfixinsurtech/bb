<?php

namespace BB\Entities;

use BB\Contracts\{CreateSlipInterface, HasPayloadInterface};
use BB\Helpers\RequiredFields;
use BB\Traits\{ConditionableTrait, HasPayload};

class CreateSlip implements HasPayloadInterface, CreateSlipInterface
{
    use HasPayload, ConditionableTrait;

    protected array $required = [
        'numeroConvenio',
        'dataVencimento',
        'valorOriginal',
    ];

    public function __construct(
        private int    $numeroConvenio,
        private string $dataVencimento,
        private float  $valorOriginal,
    )
    {
        $this->validate();
    }

    public function validate(): void
    {
        RequiredFields::check($this->required, $this);
        $this->validateNumeroConvenio($this->numeroConvenio);
        $this->validateDataVencimento($this->dataVencimento);
        $this->validateValorOriginal($this->valorOriginal);
    }

    public function getRequired(): array
    {
        return $this->required;
    }

    public function setRequired(array $required): CreateSlip
    {
        $this->required = $required;
        return $this;
    }

    public function getNumeroConvenio(): int
    {
        return $this->numeroConvenio;
    }

    public function setNumeroConvenio(int $numeroConvenio): CreateSlip
    {
        $this->numeroConvenio = $numeroConvenio;
        return $this;
    }

    public function getDataVencimento(): string
    {
        return $this->dataVencimento;
    }

    public function setDataVencimento(string $dataVencimento): CreateSlip
    {
        $this->dataVencimento = $dataVencimento;
        return $this;
    }

    public function getValorOriginal(): float
    {
        return $this->valorOriginal;
    }

    public function setValorOriginal(float $valorOriginal): CreateSlip
    {
        $this->valorOriginal = $valorOriginal;
        return $this;
    }

    private function validateNumeroConvenio(int $numeroConvenio): void
    {
        // TODO: Implement validateNumeroConvenio() method.
    }

    private function validateDataVencimento(string $dataVencimento): void
    {
        if (!preg_match('/^\d{2}\.\d{2}\.\d{4}$/', $dataVencimento)) {
            throw new \InvalidArgumentException('The dataVencimento should be in the format dd.mm.yyyy');
        }
    }

    private function validateValorOriginal(float $valorOriginal): void
    {
        if ($valorOriginal <= 0) {
            throw new \InvalidArgumentException('The valorOriginal must be greater than 0');
        }

        if (!preg_match('/^\d+(\.\d{2})?$/', $valorOriginal)) {
            throw new \InvalidArgumentException('The valorOriginal must be in the format 0.00 (decimal separated by ".").');
        }
    }
}