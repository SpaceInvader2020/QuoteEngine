<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class QuoteControllerTest extends WebTestCase
{
    /**
     * @var KernelBrowser
     */
    private $client;

    public function setUp()
    {
        $this->client = static::createClient();
    }

    public function testQuotePostMethodResponse()
    {
        $this->client->request('POST', '/');
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
        $this->assertTrue($this->client->getResponse()->headers->contains(
            'Content-Type', 'application/json'
        ));

        $this->assertEquals('{"quote":500}', $this->client->getResponse()->getContent());
    }

    public function testQuoteGetMethodResponseNotAllowed()
    {
        $this->client->request('GET', '/');
        $this->assertEquals(405, $this->client->getResponse()->getStatusCode());
    }
}
