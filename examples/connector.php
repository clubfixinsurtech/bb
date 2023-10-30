<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';


$clientId = '';
$clientSecret = '';
$developerApplicationKey = '';

// Copy the config.php.dist file to config.php and update it with your keys to run the examples
if ((!$clientId || !$clientSecret) && is_readable(__DIR__ . '/config.php')) {
    $config = include __DIR__ . '/config.php';
    $clientId = $config['client_id'];
    $clientSecret = $config['client_secret'];
    $developerApplicationKey = $config['developer_application_key'];
}

return new \BB\BBConnector(
    clientId: $clientId,
    clientSecret: $clientSecret,
    developerApplicationKey: $developerApplicationKey,
    isSandbox: true,
);
