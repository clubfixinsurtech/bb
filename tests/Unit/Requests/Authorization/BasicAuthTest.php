<?php

namespace Tests\Unit\Requests\Authorization;

use Saloon\Http\Request;
use Tests\Unit\RequestTestCase;

class BasicAuthTest extends RequestTestCase
{
    protected function requestClass(): Request
    {
        return new \BB\Requests\Authorization\BasicAuth('', '');
    }

    protected function expectedRequestMethod(): string
    {
        return 'POST';
    }

    protected function expectedEndpoint(): string
    {
        return '';
    }

    protected function expectedDefaultHeaders(): array
    {
        return [
            'Authorization',
        ];
    }
}