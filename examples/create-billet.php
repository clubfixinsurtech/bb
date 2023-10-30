<?php

/**
 * @var \BB\BBConnector $connector
 */
$connector = include __DIR__ . '/connector.php';

// Create billet
$request = $connector->bb()->createBillet([
    'numeroConvenio' => 123456789,
    'dataVencimento' => (new \DateTime())->format('d.m.Y'),
    'valorOriginal' => 100.99,
]);
$response = $request->object();

dump($request, $response);
