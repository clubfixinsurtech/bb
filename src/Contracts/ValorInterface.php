<?php

namespace BB\Contracts;

use BB\Entities\Valor;

interface ValorInterface
{
    public function getOriginal(): string;

    public function setOriginal(string $original): Valor;
}