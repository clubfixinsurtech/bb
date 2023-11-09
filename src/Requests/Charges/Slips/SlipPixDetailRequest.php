<?php

namespace BB\Requests\Charges\Slips;

use BB\Entities\NumeroTituloCliente;
use Saloon\Enums\Method;
use Saloon\Http\Request;

class SlipPixDetailRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected NumeroTituloCliente $id,
        protected int                 $numeroConvenio,
    )
    {
        //
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/cobrancas/v2/boletos/%s/pix', $this->id);
    }

    protected function defaultQuery(): array
    {
        return [
            'numeroConvenio' => $this->numeroConvenio,
        ];
    }
}