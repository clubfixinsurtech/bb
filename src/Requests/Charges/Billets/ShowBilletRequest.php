<?php

namespace BB\Requests\Charges\Billets;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class ShowBilletRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected int $id,
        protected int $numeroConvenio,
    )
    {
        //
    }

    public function resolveEndpoint(): string
    {
        return '/cobrancas/v2/boletos/' . $this->id;
    }

    protected function defaultQuery(): array
    {
        return [
            'numeroConvenio' => $this->numeroConvenio,
        ];
    }
}