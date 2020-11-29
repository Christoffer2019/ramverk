<?php

namespace Anax\Controller;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

/**
 * Controller for validating IP via REST API.
 */

class ValidateIPAddressRESTAPIController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;


    /**
     * Set URL for requests with random IP and save them in session. Render
     * view for instructions, form and testroutes.
     */

    public function indexActionGet()
    {
        $this->setURLSession();
        $page = $this->di->get("page");
        $page->add("ip/via-rest-api/validate");
        $title = "Validera IP";

        return $page->render(["title" => $title]);
    }


    /**
     * Set URL for requests with random IP and save them in session.
     * 
     * @return void
     */

    public function setURLSession()
    {
        $ip = [
            $this->getRandomIPv4(),
            $this->getRandomIPv4(),
            $this->getRandomIPv4(256, 500),
            $this->getRandomIPv6(),
            $this->getRandomIPv6(),
            $this->getRandomIPv6(50)
        ];

        $session = $this->di->get("session");
        $request = $this->di->get("request");
        $url = $request->getCurrentUrl() . "/api?ip=";

        for ($i = 0; $i < count($ip); $i++) {
            $session->set("ip-" . $i, $url . $ip[$i]);
        }
    }


    /**
     * Get random ipv4.
     * 
     * @param int $min      Minimum number for ipv4
     * @param int $max      Maximum number for ipv4
     * 
     * @return string       Random ipv4 address
     */

    public function getRandomIPv4($min = 0, $max = 255)
    {
        return mt_rand($min, $max) . "." . mt_rand($min, $max) . "." .
            mt_rand($min, $max) . "." . mt_rand($min, $max);
    }


    /**
     * Get random ipv6.
     * 
     * @param int $max      Maximum number of numbers/letters in ipv6
     *                      excluding prefix 'fd'.
     * 
     * @return string       Random ipv6 address
     */

    public function getRandomIPv6($max = 30)
    {
        $ipv6 = "fd";
        for ($i = 0; $i < $max; $i++) {
            if (($i - 2) % 4 == 0 && $i !== $max) {
                $ipv6 .= ":";
            }
            $ipv6 .= $this->getRandomHex();
        }
        return $ipv6;
    }


    /**
     * Get random hex.
     * 
     * @return string Random hex
     */

    public function getRandomHex()
    {
        $hex = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, "a", "b", "c", "d", "e", "f"];
        return strval($hex[array_rand($hex)]);
    }


    /**
     * Get ip address from posted form and save in session. Redirect to result
     * page.
     */

    public function resultActionPost()
    {
        $request = $this->di->get("request");
        $ip = $request->getPost("ip-address");
        $session = $this->di->get("session");
        $session->set("ip", $ip);
        $response = $this->di->get("response");

        return $response->redirect("validera-ip-adress/rest-api/result");
    }


    /**
     * Get URL and make request to REST API. Render the result from the
     * request.
     */

    public function resultActionGet()
    {
        $session = $this->di->get("session");
        $ip = $session->get("ip");
        $request = $this->di->get("request");
        $url = $request->getBaseUrl() . "/validera-ip-adress/rest-api/api?ip=" . $ip;
        $data = $this->callAPI($url);

        $page = $this->di->get("page");
        $page->add("anax/v2/article/default", [
            "content" => "<h1>Resultat</h1><p>" . $data . "</p>",
        ]);
        $title = "Resultat";

        return $page->render(["title" => $title]);
    }


    /**
     * Make request to REST API.
     * 
     * @param string $url       URL for making request to REST API
     * 
     * @return string           Result from request in JSON format.
     */

    public function callAPI($url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        if(!$result){die("Connection Failure");}
        curl_close($curl);

        return $result;
    }

    /**
     * Get result from REST API request.
     * 
     * @return string       Result from request in JSON format.
     */

    public function apiActionGet()
    {
        $request = $this->di->get("request");
        $url = $request->getServer("REQUEST_URI");
        $ip = substr($url, strpos($url, "api?ip=") + strlen("api?ip="));

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
