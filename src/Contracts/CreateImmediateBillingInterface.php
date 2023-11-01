<?php

namespace BB\Contracts;

use BB\Entities\{Calendario, CreateImmediateBilling, Valor};

interface CreateImmediateBillingInterface
{
    public function getCalendario(): Calendario;

    public function setCalendario(Calendario $calendario): CreateImmediateBilling;

    public function getValor(): Valor;

    public function setValor(Valor $valor): CreateImmediateBilling;

    public function getChave(): string;

    public function setChave(string $chave): CreateImmediateBilling;
}