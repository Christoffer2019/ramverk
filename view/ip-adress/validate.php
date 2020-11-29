<?php

namespace Anax\View;

/**
 * View for validating IP address.
 */

echo "<h1>Validera IP-adress</h1>" .

    '<form class="validate-IP-address-form form" method="post" action="' .
    'validera-ip-adress/result">' .
        '<input id="ip-address" type="text" name="ip-address" ' .
        'placeholder="IP-adress (ip4/ip6)">' .
        '<button id="validate" type="submit" ' .
        'name="validate" value="true">Validera</button>' .
    '</form>';
