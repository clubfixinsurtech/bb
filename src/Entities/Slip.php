<?php

namespace BB\Entities;

use BB\Strategies\SlipCreateStrategy;
use BB\Strategies\SlipListStrategy;

class Slip
{
    public function __construct()
    {
        //
    }

    public function list(string $indicadorSituacao, int $agenciaBeneficiario, int $contaBeneficiario): SlipListStrategy
    {
        return new SlipListStrategy($indicadorSituacao, $agenciaBeneficiario, $contaBeneficiario);
    }

    public function create(int $numeroConvenio, string $dataVencimento, float $valorOriginal): SlipCreateStrategy
    {
        return new SlipCreateStrategy($numeroConvenio, $dataVencimento, $valorOriginal);
    }
}