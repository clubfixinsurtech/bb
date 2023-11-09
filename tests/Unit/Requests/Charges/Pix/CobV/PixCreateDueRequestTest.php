<?php

namespace Tests\Unit\Requests\Charges\Pix\CobV;

use Saloon\Http\Request;
use Tests\Unit\RequestTestCase;

class PixCreateDueRequestTest extends RequestTestCase
{
    protected function requestClass(): Request
    {
        return new \BB\Requests\Charges\Pix\CobV\PixCreateDueRequest(
            txid: new \BB\Entities\Txid(\BB\Helpers\Txid::generate()),
            pix: new \BB\Strategies\PixCreateStrategy(),
        );
    }

    protected function expectedRequestMethod(): string
    {
        return 'PUT';
    }

    protected function expectedEndpoint(): string
    {
        return '/pix/v2/cobv/';
    }
}