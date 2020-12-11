<!-- View for validating IP address via REST API. -->

<h1>Validera IP-adress via REST API2</h1>

<p>Du kan validera en godtycklig IP-adress (ipv4/ipv6) via formuläret
eller via dessa testroutes. Requesten för REST API är <code class="code">
[base URL]/validera-ip-adress/rest-api/api?ip=[IP]?api-key=[api-key].</code>
Resultatet visas i en tom sida i formatet JSON.</p>

<!-- Form for validating IP. -->

<form
    class="validate-IP-address-form form"
    method="post"
    action="rest-api/result">
    <input
        id="ip-address"
        type="text"
        name="ip-address"
        placeholder="Din IP-adress: <?=
            isset($_SERVER["SERVER_ADDR"]) ? $_SERVER["SERVER_ADDR"] : ''
        ?>">
    <button 
        id="validate"
        type="submit"
        name="validate"
        value="true">
        Validera
    </button>
</form>
