<?php

namespace BB\Contracts;

use BB\Entities\CreateSlip;

interface CreateSlipInterface
{
    public function getNumeroConvenio(): int;

    public function setNumeroConvenio(int $numeroConvenio): CreateSlip;

    public function getDataVencimento(): string;

    public function setDataVencimento(string $dataVencimento): CreateSlip;

    public function getValorOriginal(): float;

    public function setValorOriginal(float $valorOriginal): CreateSlip;
}