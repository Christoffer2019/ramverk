<?php

namespace Anax\Controller;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

/**
 * Controller for validating IP via PHP.
 */

class ValidateIPAddressController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;


    /**
     * Render view for form.
     */

    public function indexActionGet()
    {
        $page = $this->di->get("page");
        $page->add("ip/via-php/validate");
        $title = "Validera IP";

        return $page->render(["title" => $title]);
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

        return $response->redirect("validera-ip-adress/php/result");
    }


    /**
     * Get result from validation and save in session. Render result page.
     */

    public function resultActionGet()
    {
        $session = $this->di->get("session");
        $ip = $session->get("ip");

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

        $session->set("validation", "IP-adressen är " . $validation);
        $session->set("type", $type);
        $session->set("domain", $domain);

        $page = $this->di->get("page");
        $page->add("ip/via-php/result");
        $title = "Resultat";

        return $page->render(["title" => $title]);
    }
}

