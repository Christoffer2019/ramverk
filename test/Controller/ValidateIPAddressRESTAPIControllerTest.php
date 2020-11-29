<?php

namespace Anax\Controller;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Tests for class ValidateIPAddressRESTAPIController.
 */

class ValidateIPAddressRESTAPIControllerTest extends TestCase
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

        $this->controller = new ValidateIPAddressRESTAPIController();
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
     * Test setURLSession method.
     */

    public function testSetURLSession()
    {
        $this->controller->setURLSession();
        $session = $this->di->get("session");
        $ip = true;

        for ($i = 0; $i < substr_count(implode(array_keys($_SESSION)), "ip-"); $i++) {
            if (!isset($_SESSION["ip-" . $i])) {
                $ip = false;
            }
        }

        $this->assertTrue($ip);
    }


    /**
     * Test for random valid ipv4.
     */

    public function testGetRandomIPv4Valid()
    {
        $ipv4 = $this->controller->getRandomIPv4(0, 255);
        $validation = filter_var($ipv4, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)
            ? true : false;
        $this->assertTrue($validation);
    }


    /**
     * Test for random invalid ipv4.
     */

    public function testGetRandomIPv4Invalid()
    {
        $ipv4 = $this->controller->getRandomIPv4(256, 500);
        $validation = filter_var($ipv4, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)
            ? false : true;
        $this->assertTrue($validation);
    }


    /**
     * Test for random valid ipv6.
     */

    public function testGetRandomIPv6Valid()
    {
        $ipv6 = $this->controller->getRandomIPv6(30);
        $validation = filter_var($ipv6, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)
            ? true : false;
        $this->assertTrue($validation);
    }


    /**
     * Test for random invalid ipv6.
     */

    public function testGetRandomIPv6Invalid()
    {
        $ipv6 = $this->controller->getRandomIPv6(40);
        $validation = filter_var($ipv6, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)
            ? false : true;
        $this->assertTrue($validation);
    }


    /**
     * Test for random hex.
     */

    public function testGetRandomHex()
    {
        $randomHex = $this->controller->getRandomHex();
        $hex = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, "a", "b", "c", "d", "e", "f"];
        $this->assertTrue(in_array($randomHex, $hex));
    }


    /**
     * Test 'result' route with POST method.
     */

    public function testresultActionPost()
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
        for ($i = 0; $i < count(self::$ipArray); $i++) {
            $session = $this->di->get("session");
            $session->set("ip", self::$ipArray[$i]);

            $result = $this->controller->resultActionGet();
            $body = $result->getBody();
            $main = "<h1>Resultat</h1>";
            
            $this->assertStringContainsString($main, $body);
        }
    }


    /**
     * Test API call
     */

    public function testCallAPI()
    {
        for ($i = 0; $i < count(self::$ipArray); $i++) {
            $request = $this->di->get("request");
            $url = $request->getBaseUrl() .
                "/validera-ip-adress/rest-api/api?ip=" . self::$ipArray[$i];
            $result = $this->controller->callAPI($url);
            $testResult = $this->validate(self::$ipArray[$i]);

            $this->assertEquals($result, $testResult);
        }
    }


    /**
     * Test API call
     */

    public function testApiActionGet()
    {
        for ($i = 0; $i < count(self::$ipArray); $i++) {
            $request = $this->di->get("request");
            $request->setServer("REQUEST_URI",
                "/dbwebb/ramverk1/me/redovisa/htdocs/validera-ip-adress/" .
                "rest-api/api?ip=" . self::$ipArray[$i]);

            $result = $this->controller->apiActionGet();
            $testResult = $this->validate(self::$ipArray[$i]);

            $this->assertEquals($result, $testResult);
        }
    }


    /**
     * Validate ip
     * 
     * @param string $ip        IP address
     * 
     * @return string           Result
     */

    public function validate($ip)
    {
        if(filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            $validation = "giltig";
            $type = "ipv6";
            $domain = gethostbyaddr($ip) !== $ip ? gethostbyaddr($ip) : "";
        } else if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            $validation = "giltig";
            $type = "ipv4";
            $domain = gethostbyaddr($ip) !== $ip ? gethostbyaddr($ip) : "";
        } else {
            $validation = "ogiltig.";
            $type = "";
            $domain = "";
        }

        $json = [
            "ip" => $ip,
            "validation" => "IP-adressen ar " . $validation,
            "type" => $type,
            "domain" => $domain
        ];

        return json_encode($json, true);
    }
}
