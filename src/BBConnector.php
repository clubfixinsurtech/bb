<?php

namespace BB;

use Saloon\Http\Connector;
use BB\Requests\Authorization\BasicAuth;

class BBConnector extends Connector
{
    public function __construct(
        private readonly string $clientId,
        private readonly string $clientSecret,
        private readonly string $developerApplicationKey,
        private readonly bool   $isSandbox = true,
    )
    {
        $this->requestAndSetAuthToken();
    }

    public function resolveBaseUrl(): string
    {
        return 'https://api.sandbox.bb.com.br';
    }

    public function bb(): BBResource
    {
        return new BBResource($this);
    }

    protected function defaultQuery(): array
    {
        if ($this->isSandbox === true) {
            return [
                'gw-dev-app-key' => $this->developerApplicationKey,
            ];
        }

        return [
            'gw-app-key' => $this->developerApplicationKey,
        ];
    }

    private function requestAndSetAuthToken(): void
    {
        $response = $this->send(new BasicAuth($this->clientId, $this->clientSecret));

        if ($response->failed()) {
            throw new \Exception('Failed to get token');
        }

        $this->withTokenAuth($response->object()->access_token);
    }
}
