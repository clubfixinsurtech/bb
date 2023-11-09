<?php

namespace Tests\Unit\Requests\Charges\Slips;

use Saloon\Http\Request;
use Tests\Unit\RequestTestCase;

class SlipCreateRequestTest extends RequestTestCase
{
    protected function requestClass(): Request
    {
        return new \BB\Requests\Charges\Slips\SlipCreateRequest(
            new \BB\Strategies\SlipCreateStrategy(
                numeroConvenio: 3128557,
                dataVencimento: (new \DateTime())->format('d.m.Y'),
                valorOriginal: 123.45,
            ),
        );
    }

    protected function expectedRequestMethod(): string
    {
        return 'POST';
    }

    protected function expectedEndpoint(): string
    {
        return '/cobrancas/v2/boletos';
    }

    protected function expectedDefaultBody(): array
    {
        return [
            'numeroConvenio',
            'dataVencimento',
            'valorOriginal',
        ];
    }
}