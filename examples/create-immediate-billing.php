<?php

/**
 * @var \BB\BBConnector $connector
 */
$connector = include __DIR__ . '/connector.php';

// Create immediate billing
$request = $connector->bb()->createImmediateBilling(
    new \BB\Entities\CreateImmediateBilling(
        calendario: new \BB\Entities\Calendario(
            expiracao: 3600,
        ),
        valor: new \BB\Entities\Valor(
            original: '0.01',
        ),
        chave: 'foo@bar.com',
    ),
);
$response = $request->object();

dump($request, $response);
