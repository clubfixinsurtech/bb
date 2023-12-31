<?php

namespace BB\Requests\Charges\Slips;

use BB\Contracts\SlipInterface;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class SlipCreateRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected SlipInterface $slip,
    )
    {
        //
    }

    public function resolveEndpoint(): string
    {
        return '/cobrancas/v2/boletos';
    }

    protected function defaultBody(): array
    {
        return $this->slip->payload();
    }
}