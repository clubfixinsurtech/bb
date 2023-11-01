<?php

namespace Tests\Unit\Requests\Pix\Cob;

use Saloon\Http\Request;
use Tests\Unit\RequestTestCase;

class GetImmediateBillingRequestTest extends RequestTestCase
{
    protected function requestClass(): Request
    {
        return new \BB\Requests\Charges\Pix\Cob\GetImmediateBillingRequest(
            new \BB\Entities\GetImmediateBilling(
                inicio: (new \DateTime())->format('Y-m-d\TH:i:s\Z'),
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