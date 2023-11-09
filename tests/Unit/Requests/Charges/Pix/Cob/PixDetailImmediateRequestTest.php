<?php

namespace Tests\Unit\Requests\Charges\Pix\Cob;

use Saloon\Http\Request;
use Tests\Unit\RequestTestCase;

class PixDetailImmediateRequestTest extends RequestTestCase
{
    protected function requestClass(): Request
    {
        return new \BB\Requests\Charges\Pix\Cob\PixDetailImmediateRequest(
            txid: new \BB\Entities\Txid(\BB\Helpers\Txid::generate()),
        );
    }

    protected function expectedRequestMethod(): string
    {
        return 'GET';
    }

    protected function expectedEndpoint(): string
    {
        return '/pix/v2/cob/';
    }

    protected function expectedDefaultQuery(): array
    {
        return [
            'revisao',
        ];
    }
}