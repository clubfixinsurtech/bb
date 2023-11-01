<?php

namespace Tests\Unit\Requests\Pix\Cob;

use BB\Requests\Charges\Pix\Cob\CreateImmediateBillingRequest;
use Saloon\Http\Request;
use Tests\Unit\RequestTestCase;

class CreateImmediateBillingRequestTest extends RequestTestCase
{
    protected function requestClass(): Request
    {
        return new CreateImmediateBillingRequest(
            new \BB\Entities\CreateImmediateBilling(
                calendario: new \BB\Entities\Calendario(
                    expiracao: 3600,
                ),
                valor: new \BB\Entities\Valor(
                    original: '0.01',
                ),
                chave: 'foo@bar.com',
            ),
        );
    }

    protected function expectedRequestMethod(): string
    {
        return 'POST';
    }

    protected function expectedEndpoint(): string
    {
        return '/pix/v2/cob';
    }

    protected function expectedDefaultBody(): array
    {
        return [
            'calendario',
            'valor',
            'chave',
        ];
    }
}