<?php

namespace BB\Requests\Charges\Billets;

use BB\Entities\CreateBillet;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class CreateBilletRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected array $options,
    )
    {
    }

    public function resolveEndpoint(): string
    {
        return '/cobrancas/v2/boletos';
    }

    protected function defaultBody(): array
    {
        return (new CreateBillet($this->options))->toArray();
    }
}