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

    public function testGetStylishPresentation() {
        $ip = "200.200.200.200";
        $pres = $this->model->getStylishPresentation($ip);
        $this->assertIsString($pres);
    }

    public function testGetArrayAsString() {
        $res = [
            "this_is_a_test" => true,
            "this_is_not_a_test" => false
        ];
        $pres = "";

        $pres = $this->model->getArrayAsString($res, $pres);
        $testPres = "<p>This is a test: true</p><p>This is not a test: false</p>";

        $this->assertIsString($pres);
        $this->assertEquals($pres, $testPres);
    }

    public function testGetBoolAsString() {
        $val1 = $this->model->getBoolAsString(false);
        $val2 = $this->model->getBoolAsString(true);

        $this->assertEquals($val1, "false");
        $this->assertEquals($val2, "true");
    }
}
