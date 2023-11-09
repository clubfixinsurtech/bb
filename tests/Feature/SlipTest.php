<?php

namespace Tests\Feature;

use PHPUnit\Framework\TestCase;

class SlipTest extends TestCase
{
    use CustomAsserts;

    public function test_create_slip(): void
    {
        $createSlip = $this->createSampleSlip();
        $response = $createSlip->object();

        $this->assertIsObject($response);
        $this->assertStatus(201, $createSlip);
        $this->assertObjectHasAttribute('numero', $response);
    }

    public function test_list_slips(): void
    {
        $listSlips = $this->bb->slipList(
            new \BB\Strategies\SlipListStrategy(
                indicadorSituacao: \BB\Enums\IndicadorSituacao::EM_SER,
                agenciaBeneficiario: 452,
                contaBeneficiario: 123873,
            ),
        );
        $response = $listSlips->object();

        $this->assertIsObject($response);
        $this->assertStatus(200, $listSlips);
        $this->assertObjectHasAttribute('boletos', $response);
    }

    public function test_slip_detail(): void
    {
        $createSlip = $this->createSampleSlip();
        $numero = $createSlip->json('numero');

        $slipDetail = $this->bb->slipDetail(
            id: new \BB\Entities\NumeroTituloCliente($numero),
            numeroConvenio: 3128557,
        );
        $response = $slipDetail->object();

        $this->assertIsObject($response);
        $this->assertStatus(200, $slipDetail);
        $this->assertObjectHasAttribute('codigoLinhaDigitavel', $response);
    }

    public function test_cancel_slip(): void
    {
        $this->markTestSkipped('To cancel a slip, it must be created at least 30 minutes ago');

        $createSlip = $this->createSampleSlip();
        $numero = $createSlip->json('numero');

        $cancelSlip = $this->bb->slipCancel(
            id: new \BB\Entities\NumeroTituloCliente($numero),
            numeroConvenio: 3128557,
        );
        $response = $cancelSlip->object();

        $this->assertIsObject($response);
        $this->assertStatus(200, $cancelSlip);
        $this->assertObjectHasAttribute('pix', $response);
        $this->assertObjectHasAttribute('chave', $response->pix);
    }

    public function test_create_slip_pix(): void
    {
        $createSlip = $this->createSampleSlip();
        $numero = $createSlip->json('numero');

        $slipPixCreate = $this->bb->slipPixCreate(
            id: new \BB\Entities\NumeroTituloCliente($numero),
            numeroConvenio: 3128557,
        );
        $response = $slipPixCreate->object();

        $this->assertIsObject($response);
        $this->assertStatus(200, $slipPixCreate);
        $this->assertObjectHasAttribute('pix.chave', $response);
    }

    public function test_slip_pix_detail(): void
    {
        $createSlip = $this->createSampleSlip();
        $numero = $createSlip->json('numero');

        $slipPixCreate = $this->bb->slipPixCreate(
            id: new \BB\Entities\NumeroTituloCliente($numero),
            numeroConvenio: 3128557,
        );

        $slipPixDetail = $this->bb->slipPixDetail(
            id: new \BB\Entities\NumeroTituloCliente($numero),
            numeroConvenio: 3128557,
        );
        $response = $slipPixDetail->object();

        $this->assertIsObject($response);
        $this->assertStatus(200, $slipPixDetail);
        $this->assertObjectHasAttribute('pix.valorRecebido', $response);
    }

    public function test_cancel_slip_pix(): void
    {
        $createSlip = $this->createSampleSlip();
        $numero = $createSlip->json('numero');

        $slipPixCreate = $this->bb->slipPixCreate(
            id: new \BB\Entities\NumeroTituloCliente($numero),
            numeroConvenio: 3128557,
        );

        $slipPixCancel = $this->bb->slipPixCancel(
            id: new \BB\Entities\NumeroTituloCliente($numero),
            numeroConvenio: 3128557,
        );
        $response = $slipPixCancel->object();

        $this->assertIsObject($response);
        $this->assertStatus(200, $slipPixCancel);
        $this->assertObjectHasAttribute('pix.chave', $response);
    }

    private function createSampleSlip(): \Saloon\Http\Response
    {
        $slip = new \BB\Strategies\SlipCreateStrategy(
            numeroConvenio: 3128557,
            dataVencimento: (new \DateTime())->format('d.m.Y'),
            valorOriginal: 123.45,
        );

        return $this->bb->slipCreate(
            $slip->setPagador(
                new \BB\Entities\Pagador(
                    tipoInscricao: \BB\Enums\TipoInscricao::CPF,
                    numeroInscricao: 97965940132,
                ),
            )->setNumeroTituloCliente(new \BB\Entities\NumeroTituloCliente(
                '000' . $slip->getNumeroConvenio() . mt_rand(1000000000, 9999999999)
            ))
        );
    }
}