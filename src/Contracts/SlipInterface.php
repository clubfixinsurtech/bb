<?php

namespace BB\Contracts;

use BB\Entities\Slip;

interface SlipInterface
{
    public function getIndicadorSituacao(): string;

    public function setIndicadorSituacao(string $indicadorSituacao): Slip;

    public function getAgenciaBeneficiario(): int;

    public function setAgenciaBeneficiario(int $agenciaBeneficiario): Slip;

    public function getContaBeneficiario(): int;

    public function setContaBeneficiario(int $contaBeneficiario): Slip;
}