<?php

/**
 * @var \BB\BBConnector $connector
 */
$connector = include __DIR__ . '/connector.php';

// Get slips
$request = $connector->bb()->getSlips(
    new \BB\Entities\Slip(
        indicadorSituacao: 'A',
        agenciaBeneficiario: 1234,
        contaBeneficiario: 123456,
    ),
);
$response = $request->object();

dump($response, $response->object());
