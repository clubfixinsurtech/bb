<?php

/**
 * @var \BB\BBConnector $connector
 */
$connector = include __DIR__ . '/connector.php';

// Get immediate billing
$request = $connector->bb()->getImmediateBilling(
    new \BB\Entities\GetImmediateBilling(
        inicio: (new \DateTime())->format('Y-m-d\TH:i:s\Z'),
        fim: (new \DateTime())->add(new \DateInterval('P1D'))->format('Y-m-d\TH:i:s\Z'),
    ),
);
$response = $request->object();

dump($request, $response);
