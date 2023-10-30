<?php

namespace BB\Requests\Authorization;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class BasicAuth extends Request
{
    protected Method $method = Method::POST;

    public function __construct(
        private readonly string $clientId,
        private readonly string $clientSecret,
    )
    {
        //
    }

    public function resolveEndpoint(): string
    {
        return '';
    }

    protected function defaultHeaders(): array
    {
        return [
            'Authorization' => 'Basic ' . base64_encode($this->clientId . ':' . $this->clientSecret),
        ];
    }
}