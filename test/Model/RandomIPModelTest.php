<?php

namespace chly19\Model;

use PHPUnit\Framework\TestCase;

/**
 * Tests for class RandomIPModel.
 */

class RandomIPModelTest extends TestCase
{
    /**
     * Setup new instance of RandomIPModel.
     */

    protected function setUp()
    {
        $this->model = new RandomIPModel();
    }


    /**
     * Test that an array of IPs contains one valid ipv4, one valid ipv6, one
     * invalid ipv4 and one invalid ipv6.
     */

    public function testGetRandomIP() {
        $randomIP = $this->model->getRandomIP();
        $this->testGetRandomIPv4($randomIP[0]);
        $this->testGetRandomIPv6($randomIP[1]);
        $this->testGetRandomIPv4Fail($randomIP[2]);
        $this->testGetRandomIPv6Fail($randomIP[3]);
    }


    /**
     * Test that ipv4 is valid.
     */

    public function testGetRandomIPv4($ip = null) {
        $ip = $this->model->getRandomIPv4();
        $isValid = filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) == true;
        $this->assertTrue($isValid);
    }


    /**
     * Test that ipv4 is invalid.
     */

    public function testGetRandomIPv4Fail($ip = null) {
        $ip = $this->model->getRandomIPv4(256, 300);
        $isInvalid = filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) == false;
        $this->assertTrue($isInvalid);
    }


    /**
     * Test that ipv6 is valid.
     */

    public function testGetRandomIPv6($ip = null) {
        $ip = $this->model->getRandomIPv6();
        $isValid = filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) == true;
        $this->assertTrue($isValid);
    }


    /**
     * Test that ipv6 is invalid.
     */

    public function testGetRandomIPv6Fail($ip = null) {
        $ip = $this->model->getRandomIPv6(35);
        $isInvalid = filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) == false;
        $this->assertTrue($isInvalid);
    }


    /**
     * Test that hex is valid.
     */

    public function testGetRandomHex() {
        $randomHex = $this->model->getRandomHex();
        $hex = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, "a", "b", "c", "d", "e", "f"];
        $isValid = in_array($randomHex, $hex);
        $this->assertTrue($isValid);
    }
}
