<?php

namespace Tests\Unit\Requests\Charges\Slips;

use Saloon\Http\Request;
use Tests\Unit\RequestTestCase;

class CreateSlipRequestTest extends RequestTestCase
{
    protected function requestClass(): Request
    {
        return new \BB\Requests\Charges\Slips\CreateSlipRequest(
            new \BB\Entities\CreateSlip(
                numeroConvenio: 123456789,
                dataVencimento: (new \DateTime())->format('d.m.Y'),
                valorOriginal: 100.99,
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