<?php

namespace chly19\Model;

use PHPUnit\Framework\TestCase;

/**
 * Tests for class ValidateIPModel.
 */

class ValidateIPModelTest extends TestCase
{
    /**
     * Test that the API result is an array.
     */

    public function testGetInfo() {
        $this->model = new ValidateIPModel();
        $res = $this->model->getInfo("204.204.204.204");
        $this->assertTrue(is_array($res));
    }
}
