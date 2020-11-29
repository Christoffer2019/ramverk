<?php

namespace Anax\View;

/**
 * View for validating IP address via REST API.
 */

echo "<h1>Validera IP-adress via REST API</h1>" .
    '<p>Du kan validera en godtycklig IP-adress (ipv4/ipv6) via formuläret ' .
    ' eller via dessa testroutes. Requesten för REST API är [base URL]/' .
    'validera-ip-adress/rest-api/api?ip=[IP]. Resultatet visas i JSON och ' .
    'innehåller ip, validation, type och domain. För testroutes visas ' .
    'resultatet i en tom sida. Laddtiden för requesten kan ta några ' .
    'sekunder.</p>' .


    /**
     * Form for validating IP.
     */

    '<form class="validate-IP-address-form form" method="post" action="' .
    'rest-api/result">' .
        '<input id="ip-address" type="text" name="ip-address" ' .
        'placeholder="IP-adress (ip4/ip6)">' .
        '<button id="validate" type="submit" ' .
        'name="validate" value="true">Validera</button>' .
    '</form>';


    /**
     * Create test route buttons for validating random IP.
     */

    for ($i = 0; $i < substr_count(implode(array_keys($_SESSION)), "ip-"); $i++) {
        echo '<a class="button" href="' . $_SESSION["ip-" . $i] . '">Testroute ' .
            ($i + 1) . '</a>';
    }
