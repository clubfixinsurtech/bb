<?php

namespace Tests\Unit\Requests\Charges\Slips;

use Saloon\Http\Request;
use Tests\Unit\RequestTestCase;

class SlipPixCreateRequestTest extends RequestTestCase
{
    protected function requestClass(): Request
    {
        return new \BB\Requests\Charges\Slips\SlipPixCreateRequest(
            id: new \BB\Entities\NumeroTituloCliente('00031285570000030000'),
            numeroConvenio: 3128557,
        );
    }

    protected function expectedRequestMethod(): string
    {
        return 'POST';
    }

    protected function expectedEndpoint(): string
    {
        return '/cobrancas/v2/boletos/';
    }

    protected function expectedDefaultBody(): array
    {
        return [
            'numeroConvenio',
        ];
    }
}