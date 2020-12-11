<?php
/**
 * Load the page for validating IP address through the controller class.
 */

return [
    "routes" => [
        [
            "info" => "Validera IP-adress",
            "mount" => "validera-ip-adress/php",
            "handler" => "\chly19\Controller\ValidateIPController",
            // namespace\path-to-the-class
        ],
    ]
];
