<?php

namespace BB\Requests\Charges\Pix\CobV;

use BB\Contracts\PixInterface;
use Saloon\Enums\Method;
use Saloon\Http\Request;

class PixListDueRequest extends Request
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
        return '/pix/v2/cobv';
    }

    protected function defaultQuery(): array
    {
        return $this->pix->payload();
    }
}