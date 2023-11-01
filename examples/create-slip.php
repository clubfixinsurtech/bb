<?php

/**
 * @var \BB\BBConnector $connector
 */
$connector = include __DIR__ . '/connector.php';

// Create slip
$request = $connector->bb()->createSlip(
    new \BB\Entities\CreateSlip(
        numeroConvenio: 123456789,
        dataVencimento: (new \DateTime())->format('d.m.Y'),
        valorOriginal: 100.99,
    ),
);
$response = $request->object();

dump($response, $response->object());
