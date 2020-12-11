<!-- View for validating IP address via PHP. -->
<h1>Validera IP-adress via PHP</h1>

<form class="validate-IP-address-form form" method="post" action="php/result">
    <label for="ip-address">IP-adress</label>
    <input
        id="ip-address"
        type="text"
        name="ip-address" 
        placeholder="Din IP-adress: <?=
            isset($_SERVER["SERVER_ADDR"]) ? $_SERVER["SERVER_ADDR"] : "" 
        ?>
    ">
    <button
        id="validate"
        type="submit"
        name="validate" 
        value="true">
        Validera
    </button>
</form>
