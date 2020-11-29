<?php

namespace Anax\View;

/**
 * View for the validated IP address.
 */

echo "<h1>Resultat</h1>" .
    "<p>IP-adress: " . $_SESSION["ip"] . "</p>" .
    "<p>Validering: " . $_SESSION["validation"] . "</p>" .
    "<p>Typ: " . $_SESSION["type"] . "</p>" .
    "<p>Domän: " . $_SESSION["domain"] . "</p>";
