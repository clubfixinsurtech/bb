<?php

/**
 * @var \BB\BBConnector $connector
 */
$connector = include __DIR__ . '/connector.php';

// Create pix immediate
$pixCreateImmediateRequest = $connector->bb()->pixCreateImmediate(
    pix: (new \BB\Strategies\PixCreateStrategy())
        ->setCalendario(new \BB\Entities\Calendario(
            expiracao: 3600,
        ))
        ->setValor(new \BB\Entities\Valor(
            original: 37.00,
        ))
        ->setChave('9e881f18-cc66-4fc7-8f2c-a795dbb2bfc1'),
);
$pixCreateImmediateResponse = $pixCreateImmediateRequest->object();

// Review pix immediate
$request = $connector->bb()->pixReviewImmediate(
    txid: new \BB\Entities\Txid($pixCreateImmediateRequest->json('txid')),
    pix: (new \BB\Strategies\PixCreateStrategy())
        ->setValor(new \BB\Entities\Valor(
            original: 123.45,
        ))
);
$response = $request->object();

dump($request, $response);
