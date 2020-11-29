<!-- View for validating IP address via PHP. -->
<h1>Validera IP-adress via PHP</h1>
<p>Det kan ta några sekunder innan resultatet visas.</p>

<form class="validate-IP-address-form form" method="post" action="php/result">
    <input
        id="ip-address"
        type="text"
        name="ip-address" 
        placeholder="IP-adress (ipv4/ipv6)">
    <button
        id="validate"
        type="submit"
        name="validate" 
        value="true">
        Validera
    </button>
</form>
