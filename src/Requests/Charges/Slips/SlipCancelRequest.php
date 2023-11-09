<?php

namespace BB\Requests\Charges\Slips;

use BB\Entities\NumeroTituloCliente;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class SlipCancelRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected NumeroTituloCliente $id,
        protected int                 $numeroConvenio,
    )
    {
        //
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/cobrancas/v2/boletos/%s/baixar', $this->id);
    }

    protected function defaultBody(): array
    {
        return [
            'numeroConvenio' => $this->numeroConvenio,
        ];
    }
}