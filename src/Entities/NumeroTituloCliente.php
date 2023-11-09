<?php

namespace BB\Entities;

final class NumeroTituloCliente
{
    private string $numeroTituloCliente;

    public function __construct(string $numeroTituloCliente)
    {
        if (strlen($numeroTituloCliente) !== 20) {
            throw new \InvalidArgumentException('Número do título do cliente precisa ter 20 caracteres');
        }

        if (!str_starts_with($numeroTituloCliente, '000')) {
            throw new \InvalidArgumentException('Número do título do cliente precisa começar com 000');
        }

        $this->numeroTituloCliente = $numeroTituloCliente;
    }

    public function __toString(): string
    {
        return $this->numeroTituloCliente;
    }
}