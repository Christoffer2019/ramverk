<?php
/**
 * Supply the basis for the navbar as an array.
 */
return [
    // Use for styling the menu
    "class" => "my-navbar",
 
    // Here comes the menu items/structure
    "items" => [
        [
            "text" => "<i class='fas fa-home'></i>",
            "url" => "",
            "title" => "Presentation av Christoffer Lymalm",
        ],
        [
            "text" => "<i class='fas fa-book'></i> Redovisning",
            "url" => "redovisning",
            "title" => "Redovisningstexter för kursen ramverk1.",
        ],
        [
            "text" => "<i class='fas fa-info'></i> Om",
            "url" => "om",
            "title" => "Om denna webbplats.",
        ],
        [
            "text" => "<i class='fas fa-cogs'></i> Verktyg",
            "url" => "verktyg",
            "title" => "Verktyg och möjligheter för utveckling.",
        ],
        [
            "text" => "<i class='fas fa-paint-brush'></i> Styleväljare",
            "url" => "style",
            "title" => "Välj style på webbplatsen.",
        ],
    ],
];
