<?php

namespace BB\Requests\Charges\Slips;

use BB\Contracts\SlipInterface;
use Saloon\Enums\Method;
use Saloon\Http\Request;

class SlipListRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected SlipInterface $slip
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