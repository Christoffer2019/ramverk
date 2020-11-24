<?php

namespace Anax\View;

/**
 * Style chooser.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());



?><h1>Styleväljare</h1>
<p>Här kan du välja style för webbplatsen.</p>
<form class="stylechooser" method="post" action="<?= url("style/update") ?>">
    <fieldset>
        <p>
            <select name="stylechooser" onchange="form.submit();">
                <option value="none">Ingen style är vald, standardtema används.</option>
                <?php foreach ($styles as $key => $value) :
                    $selected = $key === $activeStyle ? "selected=\"selected\"" : null;
                    ?>
                    <option <?= $selected ?> value="<?= $key ?>"><?= "[ $key ] - {$value["shortDescription"]}" ?></option>
                <?php endforeach; ?>
            </select>
        </p>
        <?php if ($activeStyle) : ?>
            <h3><i class='fas fa-info'></i> Om denna style</h3>
            <table>
                <tr>
                    <th>Filnamn:</th>
                    <td><code><?= $activeStyle ?></code></td>
                </tr>
                <tr>
                    <th>Kort beskrivning:</th>
                    <td><?= $activeShortDescription ?></td>
                </tr>
                <tr>
                    <th>Lång beskrivning:</th>
                    <td><?= $activeLongDescription ?></td>
                </tr>
            </table>
        <?php endif; ?>
    </fieldset>
</form>
