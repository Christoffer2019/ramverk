<?php
namespace chly19\Controller;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;
use chly19\Model\ValidateIPModel;
use chly19\Model\RequestButtonModel;
use chly19\Model\RequestURLModel;

/**
 * Controller for validating IP via REST API.
 */

class ValidateIPAPIController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;


    /**
     * Render view for form.
     */

    public function indexActionGet()
    {
        $request = $this->di->get("request");
        $baseUrl = $request->getCurrentUrl();

        $model = new RequestButtonModel();
        $buttons = $model->getRequestButton($baseUrl);

        $page = $this->di->get("page");
        $page->add("ip/via-rest-api/validate");
        $page->add("anax/v2/article/default", ["content" => $buttons]);

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

        return $response->redirect("validera-ip-adress/rest-api/result");
    }


    /**
     * Redirect to the API request URL.
     */

    public function resultActionGet()
    {
        $request = $this->di->get("request");
        $baseUrl = $request->getBaseUrl();
        $middleUrl = "/validera-ip-adress/rest-api";

        $session = $this->di->get("session");
        $ip = $session->get("ip");

        $requestURLModel =  new RequestURLModel();
        $url = $requestURLModel->getRequestURL($baseUrl . $middleUrl, $ip);

        $response = $this->di->get("response");
        return $response->redirect($url);
    }
    

    /**
     * Make a request to the API and return the result in JSON.
     */

    public function apiActionGet() {
        $request = $this->di->get("request");
        $url = $request->getServer("REQUEST_URI");

        $ip = $this->getStringBetweenTwoStrings($url, "?ip=", "?api-key=");
        $apiKey = substr($url, strpos($url, "?api-key=") + strlen("?api-key="));

        $validateIPModel = new ValidateIPModel();
        $validateIPModel->setApiKey($apiKey);
        $result = $validateIPModel->getInfo($ip);

        return json_encode($result, true);
    }


    /**
     * Get a string between two strings.
     * 
     * @param string $str       The source string
     * @param string $start     Choose the string after the starting point.
     * @param string $end       Choose the string before the ending point.
     * 
     * @return string           The chosen string
     */

    public function getStringBetweenTwoStrings($str, $start, $end) {
        $arr = explode($start, $str);
        if (isset($arr[1])) {
            $arr = explode($end, $arr[1]);
            return $arr[0];
        }
        return '';
    }
}
