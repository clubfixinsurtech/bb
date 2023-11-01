<?php

namespace BB\Requests\Authorization;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

class BasicAuth extends Request implements HasBody
{
    use HasFormBody;

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
        return 'https://oauth.hm.bb.com.br/oauth/token';
    }

    protected function defaultHeaders(): array
    {
        return [
            'Authorization' => 'Basic ' . base64_encode($this->clientId . ':' . $this->clientSecret),
        ];
    }

    protected function defaultBody(): array
    {
        return [
            'grant_type' => 'client_credentials',
            'scope' => 'cobrancas.boletos-info cobrancas.boletos-requisicao',
        ];
    }
}