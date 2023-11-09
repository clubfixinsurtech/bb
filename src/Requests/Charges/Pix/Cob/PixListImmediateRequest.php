<?php

namespace BB\Requests\Charges\Pix\Cob;

use BB\Contracts\PixInterface;
use Saloon\Enums\Method;
use Saloon\Http\Request;

class PixListImmediateRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly PixInterface $pix,
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
        return $this->pix->payload();
    }
}