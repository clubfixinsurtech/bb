<?php

namespace Tests\Feature;

use PHPUnit\Framework\TestCase;

class PixTest extends TestCase
{
    use CustomAsserts;

    public function test_create_immediate_pix(): void
    {
        $createImmediatePix = $this->createSampleImmediatePix();
        $response = $createImmediatePix->object();

        $this->assertIsObject($response);
        $this->assertStatus(201, $createImmediatePix);
        $this->assertObjectHasAttribute('txid', $response);
    }

    public function test_create_due_pix(): void
    {
        $createDuePix = $this->createSampleDuePix();
        $response = $createDuePix->object();

        $this->assertIsObject($response);
        $this->assertStatus(201, $createDuePix);
        $this->assertObjectHasAttribute('txid', $response);
    }

    public function test_list_immediate_pix(): void
    {
        $listImmediatePix = $this->bb->pixListImmediate(
            new \BB\Strategies\PixListStrategy(
                inicio: (new \DateTime())->sub(new \DateInterval('P1D'))->format('Y-m-d\TH:i:s\Z'),
                fim: (new \DateTime())->add(new \DateInterval('P1D'))->format('Y-m-d\TH:i:s\Z'),
            ),
        );
        $response = $listImmediatePix->object();

        $this->assertIsObject($response);
        $this->assertStatus(200, $listImmediatePix);
        $this->assertObjectHasAttribute('cobs', $response);
    }

    public function test_list_due_pix(): void
    {
        $listDuePix = $this->bb->pixListDue(
            new \BB\Strategies\PixListStrategy(
                inicio: (new \DateTime())->sub(new \DateInterval('P1D'))->format('Y-m-d\TH:i:s\Z'),
                fim: (new \DateTime())->add(new \DateInterval('P1D'))->format('Y-m-d\TH:i:s\Z'),
            ),
        );
        $response = $listDuePix->object();

        $this->assertIsObject($response);
        $this->assertStatus(200, $listDuePix);
        $this->assertObjectHasAttribute('cobs', $response);
    }

    public function test_detail_immediate_pix(): void
    {
        $createImmediatePix = $this->createSampleImmediatePix();
        $txid = $createImmediatePix->json('txid');

        $detailImmediatePix = $this->bb->pixDetailImmediate(
            txid: new \BB\Entities\Txid($txid),
        );
        $response = $detailImmediatePix->object();

        $this->assertIsObject($response);
        $this->assertStatus(200, $detailImmediatePix);
        $this->assertObjectHasAttribute('txid', $response);
    }

    public function test_detail_due_pix(): void
    {
        $createDuePix = $this->createSampleDuePix();
        $txid = $createDuePix->json('txid');

        $detailDuePix = $this->bb->pixDetailDue(
            txid: new \BB\Entities\Txid($txid),
        );
        $response = $detailDuePix->object();

        $this->assertIsObject($response);
        $this->assertStatus(200, $detailDuePix);
        $this->assertObjectHasAttribute('txid', $response);
    }

    public function test_review_immediate_pix(): void
    {
        $createImmediatePix = $this->createSampleImmediatePix();
        $txid = $createImmediatePix->json('txid');
        $valor = $createImmediatePix->json('valor.original');

        $reviewImmediatePix = $this->bb->pixReviewImmediate(
            txid: new \BB\Entities\Txid($txid),
            pix: (new \BB\Strategies\PixCreateStrategy())
                ->setValor(new \BB\Entities\Valor(
                    original: 123.45,
                ))
        );
        $response = $reviewImmediatePix->object();
        $updatedValor = $reviewImmediatePix->json('valor.original');

        $this->assertIsObject($response);
        $this->assertStatus(200, $reviewImmediatePix);
        $this->assertNotEquals($valor, $updatedValor);
        $this->assertObjectHasAttribute('txid', $response);
    }

    public function test_review_due_pix(): void
    {
        $createDuePix = $this->createSampleDuePix();
        $txid = $createDuePix->json('txid');
        $valor = $createDuePix->json('valor.original');

        $reviewDuePix = $this->bb->pixReviewDue(
            txid: new \BB\Entities\Txid($txid),
            pix: (new \BB\Strategies\PixCreateStrategy())
                ->setValor(new \BB\Entities\Valor(
                    original: 123.45,
                ))
        );
        $response = $reviewDuePix->object();
        $updatedValor = $reviewDuePix->json('valor.original');

        $this->assertIsObject($response);
        $this->assertStatus(201, $reviewDuePix);
        $this->assertNotEquals($valor, $updatedValor);
        $this->assertObjectHasAttribute('txid', $response);
    }

    private function createSampleImmediatePix(?\BB\Entities\Txid $txid = null): \Saloon\Http\Response
    {
        return $this->bb->pixCreateImmediate(
            pix: (new \BB\Strategies\PixCreateStrategy())
                ->setCalendario(new \BB\Entities\Calendario(
                    expiracao: 3600,
                ))
                ->setValor(new \BB\Entities\Valor(
                    original: 37.00,
                ))
                ->setChave('9e881f18-cc66-4fc7-8f2c-a795dbb2bfc1'),
            txid: $txid,
        );
    }

    private function createSampleDuePix(): \Saloon\Http\Response
    {
        return $this->bb->pixCreateDue(
            txid: new \BB\Entities\Txid(\BB\Helpers\Txid::generate()),
            pix: (new \BB\Strategies\PixCreateStrategy())
                ->setCalendario(new \BB\Entities\Calendario(
                    dataDeVencimento: (new \DateTime())->format('Y-m-d'),
                    validadeAposVencimento: 30,
                ))
                ->setValor(new \BB\Entities\Valor(
                    original: 37.00,
                ))
                ->setChave('9e881f18-cc66-4fc7-8f2c-a795dbb2bfc1')
                ->setDevedor(
                    new \BB\Entities\Devedor(
                        nome: 'Empresa de Serviços SA',
                        cnpj: '12345678000195',
                    ),
                ),
        );
    }
}