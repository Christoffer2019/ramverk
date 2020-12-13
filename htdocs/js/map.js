/**
 * Display IP position on a map.
 */

var mapElem = document.getElementById("leaflet-map");
var latElem = document.getElementById("latitude");
var longElem = document.getElementById("longitude");

// Check if the elements for latitude and longitude exist and if they do, get
// the value.
var lat = latElem ? parseFloat(latElem.textContent.split(": ")[1]) : null;
var long = longElem ? parseFloat(longElem.textContent.split(": ")[1]) : null;

// If the values for latitude and longitude exist, display a map based on the
// position. Create an element for making sure that the map is displayed only
// once and thus avoiding a potential loop of map requests.

if (lat && long) {
    var doRequestOnlyOnce = document.createElement("span");

    doRequestOnlyOnce.setAttribute("class", "doRequestOnlyOnce");
    document.getElementById("ip").appendChild(doRequestOnlyOnce);

    if (document.getElementsByClassName("doRequestOnlyOnce").length == 1) {
        var zoom = 6.5;
        var map = L.map('leaflet-map').setView([lat, long], zoom);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution:
                '&copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors',
            minZoom: 2.5,
            maxZoom: 16
        }).addTo(map);

        var marker = L.marker([lat, long]).addTo(map);

        marker.bindPopup("IP Address").openPopup();
    }
} else if (mapElem) {
    // Remove the map element due to set height.
    mapElem.remove();
}
