<?php

namespace chly19\Controller;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;
use chly19\Model\ValidateIPStylishPresentationModel;

/**
 * Tests for class ValidateIPController.
 */

class ValidateIPControllerTest extends TestCase
{
    protected $di;


    /**
     * Setup di and cache path.
     */

    protected function setUp()
    {
        global $di;
        $di = new DIFactoryConfig();
        $di->loadServices(ANAX_INSTALL_PATH . "/config/di");
        $di->get("cache")->setPath(ANAX_INSTALL_PATH . "/test/cache/anax");
        $this->di = $di;

        $this->controller = new ValidateIPController();
        $this->controller->setDI($this->di);
    }


    /**
     * Test 'index' route with GET method.
     */

    public function testIndexActionGet()
    {
        $result = $this->controller->indexActionGet();
        $body = $result->getBody();

        ob_start();
        $file = include __DIR__ . "/../../view/ip/via-php/validate.php";
        $this->assertStringContainsString($file, $body);
        ob_end_clean();
    }


    /**
     * Test 'result' route with POST method when using user input.
     */

    public function testresultActionPostUserInput()
    {
        $request = $this->di->get("request");
        $request->setPost("ip-address", "200.200.200.200");
        $result = $this->controller->resultActionPost();

        $this->assertInstanceOf("Anax\Response\Response", $result);
        $this->assertInstanceOf("Anax\Response\ResponseUtility", $result);
    }


    /**
     * Test 'result' route with POST method when using default input.
     */

    public function testresultActionPostDefaultInput()
    {
        $result = $this->controller->resultActionPost();
        $this->assertInstanceOf("Anax\Response\Response", $result);
        $this->assertInstanceOf("Anax\Response\ResponseUtility", $result);
    }


    /**
     * Test 'result' route with GET method.
     */

    public function testresultActionGet()
    {
        // Create array with valid ipv4, invalid ipv4 and valid ipv6.
        $ip = [
            "134.198.88.110",
            "435.320.313.350",
            "fdd8:3dd2:036a:7c11:f6f3:db49:9b5f:5cc9"
        ];

        for ($i = 0; $i < count($ip); $i++) {
            $session = $this->di->get("session");
            $session->set("ip", $ip[$i]);

            $result = $this->controller->resultActionGet();
            $body = $result->getBody();

            $model = new ValidateIPStylishPresentationModel();
            $result = $model->getStylishPresentation($ip[$i]);

            $this->assertStringContainsString($result, $body);
        }
    }
}
