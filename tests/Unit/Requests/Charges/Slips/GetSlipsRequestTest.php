<?php

namespace Tests\Unit\Requests\Charges\Slips;

use Saloon\Http\Request;
use Tests\Unit\RequestTestCase;

class GetSlipsRequestTest extends RequestTestCase
{
    protected function requestClass(): Request
    {
        return new \BB\Requests\Charges\Slips\GetSlipsRequest(
            new \BB\Entities\Slip(
                indicadorSituacao: 'A',
                agenciaBeneficiario: 1234,
                contaBeneficiario: 123456,
            ),
        );
    }

    protected function expectedRequestMethod(): string
    {
        return 'GET';
    }

    protected function expectedEndpoint(): string
    {
        return '/cobrancas/v2/boletos';
    }

    protected function expectedDefaultQuery(): array
    {
        return [
            'indicadorSituacao',
            'agenciaBeneficiario',
            'contaBeneficiario',
        ];
    }
}