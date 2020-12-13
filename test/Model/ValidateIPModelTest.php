<?php

namespace chly19\Model;
use PHPUnit\Framework\TestCase;

/**
 * Tests for class ValidateIPModel.
 */

class ValidateIPModelTest extends TestCase
{
    /**
     * Setup new instance of ValidateIPModel.
     */

    protected function setUp()
    {
        $this->model = new ValidateIPModel();
    }


    /**
     * Test that the API result is presented as expected when the API key is
     * invalid (due to not having access to the API key from this test class,
     * because it is defined in a protected method).
     */

    public function testGetInfoFail() {
        $result = $this->model->getInfo("204.204.204.204");
        $expectedResult = [
            "success" => false,
            "error" => [
                "code" => 101,
                "type" => "invalid_access_key",
                "info" => "You have not supplied a valid API Access Key. " .
                    "[Technical Support: support@apilayer.com]"
                ]
            ];

        $this->assertTrue(is_array($result));
        $this->assertEquals($result, $expectedResult);
    }


    /**
     * Test that the API result is presented as expected.
     */

    public function testGetPresentation() {
        $result = [
            "ip" => "155.4.0.248",
            "hostname" => "h-0-248.A147.priv.bahnhof.se",
            "type" => "ipv4",
            "latitude" => "56.879001617432",
            "longitude" => "14.805850028992",
            "city" => " Växjö",
            "country_code" => "SE",
            "country_name" => "Sweden",
            "continent_name" => "Europe"
        ];
        $expectedPres = $result;
        $pres = $this->model->getPresentation($result);

        $this->assertTrue(is_array($pres));
        $this->assertEquals($pres, $expectedPres);
    }
}
