<?php

namespace Tests\Feature;

trait CustomAsserts
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

        $this->assertArrayHasKey('developer_application_key', $config, 'Developer application key is missing in config');
        $this->assertNotEmpty($config['developer_application_key'], 'Developer application key is empty');
    }

    protected function setUp(): void
    {
        $config = include dirname(__DIR__, 2) . '/examples/config.php';

        $connector = new \BB\BBConnector(
            clientId: $config['client_id'],
            clientSecret: $config['client_secret'],
            developerApplicationKey: $config['developer_application_key'],
            isSandbox: true,
        );
        $this->bb = $connector->bb();
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