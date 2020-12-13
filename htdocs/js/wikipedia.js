/**
 * Display link to the country's Wikipedia page based on IP position.
 */

var wikipediaElem = document.getElementById("wikipedia");
var countryElem = document.getElementById("country_name");

// Check if the country element exists and if true, get the value.
var country = countryElem ? countryElem.textContent.split(": ")[1] : null;

// If the value for the country element exists, display a link to the country's
// Wikipedia page.
if (country) {
    var pathStart = "https://en.wikipedia.org/wiki/";

    // Add the link to the wikipedia element. If a country name contains more
    // than one word, replace the space between the words with an underscore
    // (_). This is for creating a correct link.
    wikipediaElem.href = pathStart + country.replace(" ", "_");
    wikipediaElem.textContent = "Wikipedia page for " + country;
} else if (wikipediaElem) {
    // Remove the wikipedia element.
    wikipediaElem.remove();
}
