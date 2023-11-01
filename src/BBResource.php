<?php

namespace BB;

use Saloon\Http\{BaseResource, Response};
use BB\Requests\Charges\Pix\Cob\{CreateImmediateBillingRequest, GetImmediateBillingRequest};
use BB\Entities\{CreateImmediateBilling, CreateSlip, GetImmediateBilling, Slip};
use BB\Requests\Charges\Slips\{CreateSlipRequest, GetSlipsRequest};

class BBResource extends BaseResource
{
    public function getSlips(Slip $slip): Response
    {
        return $this->connector->send(new GetSlipsRequest($slip));
    }

    public function createSlip(CreateSlip $slip): Response
    {
        return $this->connector->send(new CreateSlipRequest($slip));
    }

    public function createImmediateBilling(CreateImmediateBilling $immediateBilling): Response
    {
        return $this->connector->send(new CreateImmediateBillingRequest($immediateBilling));
    }

    public function getImmediateBilling(GetImmediateBilling $immediateBilling): Response
    {
        return $this->connector->send(new GetImmediateBillingRequest($immediateBilling));
    }
}