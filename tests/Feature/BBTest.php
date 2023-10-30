<?php

namespace Tests\Feature;

use PHPUnit\Framework\TestCase;

class BBTest extends TestCase
{
    private \BB\BBResource $bb;

    protected function assertPreConditions(): void
    {
        $configFile = dirname(__DIR__, 2) . '/examples/config.php';

        $this->assertFileExists($configFile);

        $config = include $configFile;

        $this->assertArrayHasKey('client_id', $config, 'Client ID is missing in config');
        $this->assertNotEmpty($config['client_id'], 'Client ID is empty');

        $this->assertArrayHasKey('client_secret', $config, 'Client secret is missing in config');
        $this->assertNotEmpty($config['client_secret'], 'Client secret is empty');
    }

    protected function setUp(): void
    {
        $config = include dirname(__DIR__, 2) . '/examples/config.php';
        $clientId = $config['client_id'];
        $clientSecret = $config['client_secret'];

        $connector = new \BB\BBConnector(clientId: $clientId, clientSecret: $clientSecret);
        $this->bb = $connector->bb();
    }

    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    private function assertObjectHasAttribute(string $attribute, object $object): void
    {
        $this->assertTrue(property_exists($object, $attribute), "Property $attribute does not exist");
    }

    private function assertStatus(int $expected, \Saloon\Http\Response $response): void
    {
        $this->assertEquals($expected, $response->status(), 'Status code is not ' . $expected);
    }
}