<?php

namespace Tests\Unit\Requests\Pix\Cob;

use Saloon\Http\Request;
use Tests\Unit\RequestTestCase;

class CreateImmediateBillingRequestTest extends RequestTestCase
{
    protected function requestClass(): Request
    {
        // TODO: Implement requestClass() method.
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