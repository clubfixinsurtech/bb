<?php

/**
 * @var \BB\BBConnector $connector
 */
$connector = include __DIR__ . '/connector.php';

// Create slip
$slip = new \BB\Strategies\SlipCreateStrategy(
    numeroConvenio: 3128557,
    dataVencimento: (new \DateTime())->format('d.m.Y'),
    valorOriginal: 123.45,
);

$request = $connector->bb()->slipCreate(
    $slip->setPagador(
        new \BB\Entities\Pagador(
            tipoInscricao: \BB\Enums\TipoInscricao::CPF,
            numeroInscricao: 97965940132,
        ),
    )->setNumeroTituloCliente(new \BB\Entities\NumeroTituloCliente('000' . $slip->getNumeroConvenio() . mt_rand(1000000000, 9999999999)))
);
$response = $request->object();

dump($request, $response);
