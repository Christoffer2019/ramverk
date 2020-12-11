<?php
/**
 * Load the page for validating IP address through the controller class.
 */

return [
    "routes" => [
        [
            "info" => "Validera IP-adress rest api",
            "mount" => "validera-ip-adress/rest-api",
            "handler" => "\chly19\Controller\ValidateIPAPIController",
        ],
    ]
];
