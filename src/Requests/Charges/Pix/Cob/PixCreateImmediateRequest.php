<?php

namespace BB\Requests\Charges\Pix\Cob;

use BB\Contracts\PixInterface;
use BB\Entities\Txid;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class PixCreateImmediateRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected PixInterface $pix,
        protected ?Txid        $txid = null,
    )
    {
        if ($this->txid) {
            $this->method = Method::PUT;
        }
    }

    public function resolveEndpoint(): string
    {
        if ($this->txid) {
            return '/pix/v2/cob/' . $this->txid;
        }

        return '/pix/v2/cob';
    }

    protected function defaultBody(): array
    {
        return $this->pix->payload();
    }
}