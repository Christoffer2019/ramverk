/**
 * Display flag based on IP position.
 */

var flagElem = document.getElementById("flag");
var countryCodeElem = document.getElementById("country_code");

// Check if the country code element exists and if true, get the value.
var countryCode = countryCodeElem ? countryCodeElem.textContent.split(": ")[1] : null;

// If the value for the country code element exists, display the country flag.
if (countryCode) {
    var pathStart = "../../img/minimalistic/flags/";
    var pathEnd = ".png";

    // Add the image source to the flag element.
    flagElem.src = pathStart + countryCode + pathEnd;
} else if (flagElem) {
    // Remove the flag element.
    flagElem.remove();
}
