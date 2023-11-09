<?php

/**
 * @var \BB\BBConnector $connector
 */
$connector = include __DIR__ . '/connector.php';

// Create slip
$slip = new \BB\Strategies\SlipCreateStrategy(
    numeroConvenio: 3128557,
    dataVencimento: (new \DateTime())->modify('-1 day')->format('d.m.Y'),
    valorOriginal: 123.45,
);

$slipCreateRequest = $connector->bb()->slipCreate(
    $slip->setPagador(
        new \BB\Entities\Pagador(
            tipoInscricao: \BB\Enums\TipoInscricao::CPF,
            numeroInscricao: 97965940132,
        ),
    )->setDataEmissao((new \DateTime())->modify('-2 day')->format('d.m.Y'))
    ->setNumeroTituloCliente(new \BB\Entities\NumeroTituloCliente('000' . $slip->getNumeroConvenio() . mt_rand(1000000000, 9999999999)))
);
$slipCreateResponse = $slipCreateRequest->object();

// Slip cancel
$request = $connector->bb()->slipCancel(
    id: new \BB\Entities\NumeroTituloCliente($slipCreateRequest->json('numero')),
    numeroConvenio: 3128557,
);
$response = $request->object();

dump($request, $response);
