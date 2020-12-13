REVISION history
================

V1.0.0 (2020-11-24)
-------------------

Added
* images
* new style theme: main-minimalistic.less
* flash image for subpages in 'verktyg' and 'redovisning'
* main.js for showing/hiding to-top-page button and loading different images based on screen width.

Updated
* navbar
* website content

Changed
* favicon, logo and default style sheet.
* structure and content in stylechooser.
* structure for flash message

Deleted
* favicon

V1.0.1 (2020-11-29)
-------------------

Added
* routes for sample, IP and REST API controllers
* views for validating IP address.
* image for statistics about popularity for PHP Frameworks in Google Trends.
* test classes for controller classes that validate IP addresses via PHP and REST API
* controllers for validating IP address via PHP and REST API.
* README for sample controllers.
* cache

Updated
* REVISION history
* navbar
* style for minimalistic theme

Deleted
* some sample controllers
* some sample test classes
* some files

* Wrote article for course part 1.

V2.0.0 (2020-12-11)
-------------------

Added
* information for course part 2 about which API I am using, where the API key is stored and which package I am using for handling environment variables.
* package vlucas/phpdotenv v5.2 for handling environment variables.
* my own namespace for the website.
* example file for storing environment variables. Just change the value in the file.
* test classes for models, controllers and trait
* classes for models and trait
* .gitignore

Updated
* router for handling API Validator page.
* style for minimalistic theme.
* views for validating IP
* revision history

Deleted
* some files

Miscellaneous
* Renamed file for IP API Controller class
* Wrote article for course part 2.

V2.1.0 (2020-12-13)
-------------------

Added
* view/ip/via-php/result.php for displaying information on IP.
* js/map.js, js/wikipedia.js and js/flag.js for displaying IP position on a map, a link to the country's Wikipedia page and the country's flag when the API result for an IP is displayed.
* id for p tag about flag credits.
* Images
    * country flags in view/ip/via-php/result.php
    * robot in content/validera-ip-adress.md
    * layers, location, marker icon and marker shadow for leaflet map.

Updated
* credits for images in footer.
* minimalistic style
* controller and models for validating IP.

* Improved test methods for models and controller classes in order to get 100% code coverage.