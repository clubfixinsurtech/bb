<?php

namespace BB\Requests\Charges\Billets;

use BB\Entities\GetBillets;
use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetBilletsRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected array $options
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
        return (new GetBillets($this->options))->toArray();
    }
}