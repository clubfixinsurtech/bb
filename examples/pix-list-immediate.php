<?php

/**
 * @var \BB\BBConnector $connector
 */
$connector = include __DIR__ . '/connector.php';

// List pix immediate
$request = $connector->bb()->pixListImmediate(
    new \BB\Strategies\PixListStrategy(
        inicio: (new \DateTime())->sub(new DateInterval('P1D'))->format('Y-m-d\TH:i:s\Z'),
        fim: (new \DateTime())->add(new \DateInterval('P1D'))->format('Y-m-d\TH:i:s\Z'),
    ),
);
$response = $request->object();

dump($request, $response);
