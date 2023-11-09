<?php

namespace Tests\Unit\Requests\Charges\Pix\CobV;

use Saloon\Http\Request;
use Tests\Unit\RequestTestCase;

class PixDetailDueRequestTest extends RequestTestCase
{
    protected function requestClass(): Request
    {
        return new \BB\Requests\Charges\Pix\CobV\PixDetailDueRequest(
            txid: new \BB\Entities\Txid(\BB\Helpers\Txid::generate()),
        );
    }

    protected function expectedRequestMethod(): string
    {
        return 'GET';
    }

    protected function expectedEndpoint(): string
    {
        return '/pix/v2/cobv/';
    }

    protected function expectedDefaultQuery(): array
    {
        return [
            'revisao',
        ];
    }
}