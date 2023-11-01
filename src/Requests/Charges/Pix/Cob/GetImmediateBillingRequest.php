<?php

namespace BB\Requests\Charges\Pix\Cob;

use BB\Entities\GetImmediateBilling;
use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetImmediateBillingRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly GetImmediateBilling $immediateBilling,
    )
    {
        //
    }

    public function resolveEndpoint(): string
    {
        return '/pix/v2/cob';
    }

    protected function defaultQuery(): array
    {
        return $this->immediateBilling->payload();
    }
}