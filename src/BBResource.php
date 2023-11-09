<?php

namespace BB;

use Saloon\Http\{BaseResource, Request, Response};
use BB\Entities\{NumeroTituloCliente, Txid};
use BB\Contracts\{PixInterface, SlipInterface};
use BB\Requests\Charges\Pix\{
    Cob\PixCreateImmediateRequest,
    Cob\PixDetailImmediateRequest,
    Cob\PixListImmediateRequest,
    Cob\PixReviewImmediateRequest,
    CobV\PixCreateDueRequest,
    CobV\PixDetailDueRequest,
    CobV\PixListDueRequest,
    CobV\PixReviewDueRequest
};
use BB\Requests\Charges\Slips\{
    SlipCancelRequest,
    SlipCreateRequest,
    SlipDetailRequest,
    SlipListRequest,
    SlipPixCancelRequest,
    SlipPixCreateRequest,
    SlipPixDetailRequest
};

class BBResource extends BaseResource
{
    public function slipList(SlipInterface $slip): Response
    {
        return $this->send(new SlipListRequest($slip));
    }

    public function slipCreate(SlipInterface $slip): Response
    {
        return $this->send(new SlipCreateRequest($slip));
    }

    public function slipDetail(NumeroTituloCliente $id, int $numeroConvenio): Response
    {
        return $this->send(new SlipDetailRequest($id, $numeroConvenio));
    }

    public function slipCancel(NumeroTituloCliente $id, int $numeroConvenio): Response
    {
        return $this->send(new SlipCancelRequest($id, $numeroConvenio));
    }

    public function slipPixCreate(NumeroTituloCliente $id, int $numeroConvenio): Response
    {
        return $this->send(new SlipPixCreateRequest($id, $numeroConvenio));
    }

    public function slipPixDetail(NumeroTituloCliente $id, int $numeroConvenio): Response
    {
        return $this->send(new SlipPixDetailRequest($id, $numeroConvenio));
    }

    public function slipPixCancel(NumeroTituloCliente $id, int $numeroConvenio): Response
    {
        return $this->send(new SlipPixCancelRequest($id, $numeroConvenio));
    }

    public function pixListImmediate(PixInterface $pix): Response
    {
        return $this->send(new PixListImmediateRequest($pix));
    }

    public function pixListDue(PixInterface $pix): Response
    {
        return $this->send(new PixListDueRequest($pix));
    }

    public function pixCreateImmediate(PixInterface $pix, ?Txid $txid = null): Response
    {
        return $this->send(new PixCreateImmediateRequest($pix, $txid));
    }

    public function pixCreateDue(Txid $txid, PixInterface $pix): Response
    {
        return $this->send(new PixCreateDueRequest($txid, $pix));
    }

    public function pixDetailImmediate(Txid $txid, ?int $revisao = null): Response
    {
        return $this->send(new PixDetailImmediateRequest($txid, $revisao));
    }

    public function pixDetailDue(Txid $txid, ?int $revisao = null): Response
    {
        return $this->send(new PixDetailDueRequest($txid, $revisao));
    }

    public function pixReviewImmediate(Txid $txid, PixInterface $pix): Response
    {
        return $this->send(new PixReviewImmediateRequest($txid, $pix));
    }

    public function pixReviewDue(Txid $txid, PixInterface $pix): Response
    {
        return $this->send(new PixReviewDueRequest($txid, $pix));
    }

    private function send(Request $request): Response
    {
        return $this->connector->send($request);
    }
}