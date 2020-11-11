<?php

namespace App\Tests;

use App\Service\AbiCodeLookup;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

class AbiCodeLookupTest extends TestCase
{
    /**
     * @var AbiCodeLookup
     */
    private $abiCodeLookup;
    /**
     * @var RequestStack
     */
    private $requestStack;

    public function setUp()
    {
        $client = $this->getMockBuilder('GuzzleHttp\Client')
            ->disableOriginalConstructor()
            ->getMock();

        $this->requestStack = new RequestStack();
        $this->abiCodeLookup = new AbiCodeLookup($client, $this->requestStack);

    }

    public function testGetResponseWhenRegNoUndefined()
    {
        $response = $this->abiCodeLookup->getResponse();
        $this->assertNull($response);
    }

    public function testGetResponseWhenRegNoDefined()
    {

        $input = [ "regNo"=>"LB15WSJ" ];
        $output = new JsonResponse(["abi_code" => "22529902"], 200);

        $request = new Request($input, [], [], [], [], [], []);
        $this->requestStack->push($request);

        $response = $this->abiCodeLookup->getResponse();
        $this->assertEquals($output, $response);

    }

}
