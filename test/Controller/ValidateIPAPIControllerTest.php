<?php

namespace chly19\Controller;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;
use chly19\Model\ValidateIPModel;
use chly19\Model\RequestURLModel;

/**
 * Tests for class ValidateIPRESTAPIController.
 */

class ValidateIPAPIControllerTest extends TestCase
{
    protected $di;
    public static $ipArray = [
        "134.198.88.110",
        "435.320.313.350",
        "fdd8:3dd2:036a:7c11:f6f3:db49:9b5f:5cc9"
    ];

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

        $this->controller = new ValidateIPAPIController();
        $this->controller->setDI($this->di);

        $request = $this->di->get("request");
        $request->setBaseUrl("http://localhost:8080/dbwebb/ramverk1/me/redovisa/htdocs");
    }


    /**
     * Test 'index' route with GET method.
     */

    public function testIndexActionGet()
    {
        $result = $this->controller->indexActionGet();
        $body = $result->getBody();

        ob_start();
        $file = include __DIR__ . "/../../view/ip/via-rest-api/validate.php";
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
        $result = $this->controller->resultActionGet();
        $this->assertInstanceOf("Anax\Response\Response", $result);
        $this->assertInstanceOf("Anax\Response\ResponseUtility", $result);
    }


    /**
     * Test API call
     */

    public function testApiActionGet()
    {
        for ($i = 0; $i < count(self::$ipArray); $i++) {
            $baseUrl = "/dbwebb/ramverk1/me/redovisa/htdocs/validera-ip-adress/" .
                "rest-api";
            $requestURLModel = new RequestURLModel();
            $url = $requestURLModel->getRequestURL($baseUrl, self::$ipArray[$i]);

            $request = $this->di->get("request");
            $request->setServer("REQUEST_URI", $url);

            $model = new ValidateIPModel();
            $ValidResult = $model->getInfo(self::$ipArray[$i]);
            $result = $this->controller->apiActionGet();

            $this->assertEquals($result, json_encode($ValidResult, true));
        }
    }


    /**
     * Test getting string between two strings.
     */

    public function testGetStringBetweenTwoStrings() {
        $str = "ThisIsATest";
        $start = "Is";
        $end = "Test";
        $res = $this->controller->getStringBetweenTwoStrings($str, $start, $end);
        $this->assertEquals($res, "A");
    }

    /**
     * Test getting string between two strings when there is no string
     * between the start and end.
     */

    public function testGetStringBetweenTwoStringsFail() {
        $str = "ThisIsATest";
        $start = "Test";
        $end = " ";
        $res = $this->controller->getStringBetweenTwoStrings($str, $start, $end);
        $this->assertEquals($res, "");
    }
}
