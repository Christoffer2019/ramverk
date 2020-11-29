<?php
/**
 * Load the page for validating IP address through the controller class.
 */

return [
    "routes" => [
        [
            "info" => "Validera IP-adress",
            "mount" => "validera-ip-adress/rest-api",
            "handler" => "\Anax\Controller\ValidateIPAddressRESTAPIController",
        ],
    ]
];
