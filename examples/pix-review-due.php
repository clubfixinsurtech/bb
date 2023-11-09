<?php

/**
 * @var \BB\BBConnector $connector
 */
$connector = include __DIR__ . '/connector.php';

// Create pix due
$pixCreateDueRequest = $connector->bb()->pixCreateDue(
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
$pixCreateDueResponse = $pixCreateDueRequest->object();

// Review pix immediate
$request = $connector->bb()->pixReviewDue(
    txid: new \BB\Entities\Txid($pixCreateDueRequest->json('txid')),
    pix: (new \BB\Strategies\PixCreateStrategy())
        ->setValor(new \BB\Entities\Valor(
            original: 123.45,
        ))
);
$response = $request->object();

dump($request, $response);
