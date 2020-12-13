<?php

namespace chly19\Model;

use PHPUnit\Framework\TestCase;

/**
 * Tests for class ValidateIPStylishPresentationModel.
 */

class ValidateIPStylishPresentationModelTest extends TestCase
{
    /**
     * Setup new instance of ValidateIPStylishPresentationModel.
     */

    protected function setUp()
    {
        $this->model = new ValidateIPStylishPresentationModel();
    }


    /**
     * Test that the API result based on a defined IP is a string.
     */

    public function testGetStylishPresentation() {
        $ip = "200.200.200.200";
        $pres = $this->model->getStylishPresentation($ip);
        $this->assertIsString($pres);
    }


    /**
     * Test that the array is converted to string and compare with the
     * expected result.
     */

    public function testGetArrayAsString() {
        $res = [
            "this_is_a_test" => true,
            "this_is_not_a_test" => false
        ];
        $pres = "";

        $pres = $this->model->getArrayAsString($res, $pres);
        $testPres = "<p id='this_is_a_test'>This is a test: true</p>" .
            "<p id='this_is_not_a_test'>This is not a test: false</p>";

        $this->assertIsString($pres);
        $this->assertEquals($pres, $testPres);
    }


    /**
     * Test that a boolean value (true/false) is converted to a string and
     * compare with the expected result.
     */

    public function testGetBoolAsString() {
        $val1 = $this->model->getBoolAsString(false);
        $val2 = $this->model->getBoolAsString(true);

        $this->assertIsString($val1);
        $this->assertIsString($val2);

        $this->assertEquals($val1, "false");
        $this->assertEquals($val2, "true");
    }
}
