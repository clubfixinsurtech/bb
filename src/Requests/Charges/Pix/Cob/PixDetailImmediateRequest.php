<?php

namespace BB\Requests\Charges\Pix\Cob;

use BB\Entities\Txid;
use Saloon\Enums\Method;
use Saloon\Http\Request;

class PixDetailImmediateRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected Txid $txid,
        protected ?int $revisao = null,
    )
    {
        //
    }

    public function resolveEndpoint(): string
    {
        return '/pix/v2/cob/' . $this->txid;
    }

    protected function defaultQuery(): array
    {
        return [
            'revisao' => $this->revisao,
        ];
    }
}