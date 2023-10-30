<?php

namespace Tests\Unit\Requests\Charges\Billets;

use BB\Requests\Charges\Billets\ShowBilletRequest;
use Saloon\Http\Request;
use Tests\Unit\RequestTestCase;

class ShowBilletRequestTest extends RequestTestCase
{
    protected function requestClass(): Request
    {
        return new ShowBilletRequest(1, 1);
    }

    protected function expectedRequestMethod(): string
    {
        return 'GET';
    }

    protected function expectedEndpoint(): string
    {
        return '/cobrancas/v2/boletos/';
    }

    protected function expectedDefaultQuery(): array
    {
        return [
            'numeroConvenio',
        ];
    }
}