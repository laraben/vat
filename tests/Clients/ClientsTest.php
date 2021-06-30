<?php

namespace Laraben\Vat\Tests\Clients;

use Laraben\Vat\Clients\LarabenVatRatesClient;
use Laraben\Vat\Clients\Client;
use Laraben\Vat\Period;
use PHPUnit\Framework\TestCase;

class ClientsTest extends TestCase
{

    /**
     * @group remote-http
     * @dataProvider clientProvider
     */
    public function testClient(Client $client)
    {
        $data = $client->fetch();
        $this->assertIsArray($data);
        $this->assertArrayHasKey('NL', $data);
        $this->assertIsArray($data['NL']);
        $this->assertInstanceOf(Period::class, $data['NL'][0]);
    }

    public function clientProvider()
    {
        yield [new LarabenVatRatesClient()];
    }
}
