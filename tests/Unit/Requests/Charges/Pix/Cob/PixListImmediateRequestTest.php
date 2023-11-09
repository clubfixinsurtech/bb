<?php

namespace Tests\Unit\Requests\Charges\Pix\Cob;

use Saloon\Http\Request;
use Tests\Unit\RequestTestCase;

class PixListImmediateRequestTest extends RequestTestCase
{
    protected function requestClass(): Request
    {
        return new \BB\Requests\Charges\Pix\Cob\PixListImmediateRequest(
            new \BB\Strategies\PixListStrategy(
                inicio: (new \DateTime())->sub(new \DateInterval('P1D'))->format('Y-m-d\TH:i:s\Z'),
                fim: (new \DateTime())->add(new \DateInterval('P1D'))->format('Y-m-d\TH:i:s\Z'),
            ),
        );
    }

    protected function expectedRequestMethod(): string
    {
        return 'GET';
    }

    protected function expectedEndpoint(): string
    {
        return '/pix/v2/cob';
    }

    protected function expectedDefaultQuery(): array
    {
        return [
            'inicio',
            'fim',
        ];
    }
}