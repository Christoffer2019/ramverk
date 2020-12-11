<?php

namespace chly19\Model;

use PHPUnit\Framework\TestCase;

/**
 * Tests for class RequestButtonModel.
 */

class RequestButtonModelTest extends TestCase
{
    /**
     * Test that the buttons are correct.
     */

    public function testGetRequestButton() {
        $this->requestButtonModel = new RequestButtonModel();
        $this->requestURLModel = new RequestURLModel();

        $baseUrl = "baseUrl";
        $buttons = $this->requestButtonModel->getRequestButton($baseUrl);
        $ip = $this->requestButtonModel->ip;

        for ($i = 0; $i < count($ip); $i++) {
            $url = $this->requestURLModel->getRequestURL($baseUrl, $ip[$i]);
            $this->assertContains($url, $buttons);
        }
    }
}
