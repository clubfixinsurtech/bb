<?php

namespace Tests\Unit\Requests\Charges\Billets;

use BB\Requests\Charges\Billets\GetBilletsRequest;
use Saloon\Http\Request;
use Tests\Unit\RequestTestCase;

class GetBilletsRequestTest extends RequestTestCase
{
    protected function requestClass(): Request
    {
        return new GetBilletsRequest([
            'indicadorSituacao' => 'A',
            'agenciaBeneficiario' => 1111,
            'contaBeneficiario' => 1111111,
        ]);
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