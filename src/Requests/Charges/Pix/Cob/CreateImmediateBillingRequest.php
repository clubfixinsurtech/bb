<?php

namespace BB\Requests\Charges\Pix\Cob;

use BB\Entities\CreateImmediateBilling;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class CreateImmediateBillingRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected CreateImmediateBilling $immediateBilling,
    )
    {
    }

    public function resolveEndpoint(): string
    {
        return '/pix/v2/cob';
    }

    protected function defaultBody(): array
    {
        return $this->immediateBilling->payload();
    }
}