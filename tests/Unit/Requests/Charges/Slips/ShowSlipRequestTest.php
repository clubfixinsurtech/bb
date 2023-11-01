<?php

namespace Tests\Unit\Requests\Charges\Slips;

use BB\Requests\Charges\Slips\ShowSlipRequest;
use Saloon\Http\Request;
use Tests\Unit\RequestTestCase;

class ShowSlipRequestTest extends RequestTestCase
{
    protected function requestClass(): Request
    {
        return new ShowSlipRequest(1, 1);
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