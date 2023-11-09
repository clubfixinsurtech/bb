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

    protected array $chargeScopes = [
        'cobrancas.boletos-info',
        'cobrancas.boletos-requisicao',
    ];

    protected array $pixScopes = [
        'cob.write',
        'cob.read',
        'cobv.write',
        'cobv.read',
        'pix.write',
        'pix.read',
    ];

    public function __construct(
        private readonly string $clientId,
        private readonly string $clientSecret,
        private readonly bool   $isSandbox = true,
    )
    {
        //
    }

    public function resolveEndpoint(): string
    {
        if ($this->isSandbox === true) {
            return 'https://oauth.hm.bb.com.br/oauth/token';
        }

        return 'https://oauth.bb.com.br/oauth/token';
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
            'scope' => $this->getScopes(),
        ];
    }

    private function getScopes(): string
    {
        return implode(' ', array_merge($this->chargeScopes, $this->pixScopes));
    }
}