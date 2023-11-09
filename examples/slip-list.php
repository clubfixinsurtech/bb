<?php

/**
 * @var \BB\BBConnector $connector
 */
$connector = include __DIR__ . '/connector.php';

// List slips
$request = $connector->bb()->slipList(
    new \BB\Strategies\SlipListStrategy(
        indicadorSituacao: \BB\Enums\IndicadorSituacao::EM_SER,
        agenciaBeneficiario: 452,
        contaBeneficiario: 123873,
    ),
);
$response = $request->object();

dump($request, $response);
