<?php

namespace chly19\Model;

use PHPUnit\Framework\TestCase;
use chly19\Traits\ApiKeyTrait;

/**
 * Tests for class RequestURLModel.
 */

class RequestURLModelTest extends TestCase
{
    use ApiKeyTrait;

    /**
     * Test that the request URL are correct.
     */

    public function testgetRequestURL() {
        $this->model = new RequestURLModel();

        $baseUrl = "baseUrl";
        $ip = "200.200.200.200";
        $apiKey = $this->getApiKey();
        $url = $this->model->getRequestURL($baseUrl, $ip);

        $validUrl = $baseUrl . '/api?ip=' . $ip . '?api-key=' . $apiKey;
        $this->assertEquals($validUrl, $url);
    }
}
