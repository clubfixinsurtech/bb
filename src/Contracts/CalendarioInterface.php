<?php

namespace BB\Contracts;

use BB\Entities\Calendario;

interface CalendarioInterface
{
    public function getExpiracao(): int;

    public function setExpiracao(int $expiracao): Calendario;
}