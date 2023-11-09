<?php

namespace Tests\Unit\Requests\Charges\Slips;

use Saloon\Http\Request;
use Tests\Unit\RequestTestCase;

class SlipListRequestTest extends RequestTestCase
{
    protected function requestClass(): Request
    {
        return new \BB\Requests\Charges\Slips\SlipListRequest(
            new \BB\Strategies\SlipListStrategy(
                indicadorSituacao: \BB\Enums\IndicadorSituacao::EM_SER,
                agenciaBeneficiario: 452,
                contaBeneficiario: 123873,
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