<?php
namespace chly19\Controller;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;
use chly19\Model\ValidateIPStylishPresentationModel;

/**
 * Controller for validating IP via PHP.
 */

class ValidateIPController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;


    /**
     * Render view for form.
     */

    public function indexActionGet()
    {
        $page = $this->di->get("page");
        $page->add("ip/via-php/validate");

        return $page->render(["title" => "Validera IP"]);
    }


    /**
     * Get ip address from posted form and save in session. Redirect to result
     * page.
     */

    public function resultActionPost()
    {
        $request = $this->di->get("request");
        $ip = ($request->getPost("ip-address")) == true ?
            $request->getPost("ip-address") :
            $request->getServer("SERVER_ADDR");
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

        $model = new ValidateIPStylishPresentationModel();
        $result = $model->getStylishPresentation($ip);

        $page = $this->di->get("page");
        $page->add("anax/v2/article/default", [
            "content" => "<h1>Resultat</h1>" . $result
        ]);
        // Display map, flag and link to the country's Wikipedia page based
        // on IP position.
        $page->add("ip/via-php/result");

        return $page->render(["title" => "Resultat"]);
    }
}

