<?php

namespace BB\Requests\Charges\Pix\CobV;

use BB\Contracts\PixInterface;
use BB\Entities\Txid;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class PixCreateDueRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(
        protected Txid         $txid,
        protected PixInterface $pix,
    )
    {
        //
    }

    public function resolveEndpoint(): string
    {
        return '/pix/v2/cobv/' . $this->txid;
    }

    protected function defaultBody(): array
    {
        return $this->pix->payload();
    }
}