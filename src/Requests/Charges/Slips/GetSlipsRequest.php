<?php

namespace BB\Requests\Charges\Slips;

use BB\Entities\Slip;
use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetSlipsRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected Slip $slip
    )
    {
        //
    }

    public function resolveEndpoint(): string
    {
        return '/cobrancas/v2/boletos';
    }

    protected function defaultQuery(): array
    {
        return $this->slip->payload();
    }
}