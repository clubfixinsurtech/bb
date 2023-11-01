<?php

namespace BB\Contracts;

use BB\Entities\GetImmediateBilling;

interface GetImmediateBillingInterface
{
    public function getInicio(): string;

    public function setInicio(string $inicio): GetImmediateBilling;

    public function getFim(): string;

    public function setFim(string $fim): GetImmediateBilling;
}