<?php

namespace BB;

use Saloon\Http\{BaseResource, Response};
use BB\Requests\Charges\Billets\CreateBilletRequest;

class BBResource extends BaseResource
{
    public function createBillet(array $options): Response
    {
        return $this->connector->send(new CreateBilletRequest($options));
    }
}