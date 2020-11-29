<?php
/**
 * Supply the basis for the navbar as an array.
 */
return [
    // Use for styling the menu
    "id" => "rm-menu",
    "wrapper" => null,
    "class" => "rm-default rm-mobile",
 
    // Here comes the menu items
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
            "submenu" => [
                "items" => [
                    [
                        "text" => "Kmom01",
                        "url" => "redovisning/kmom01",
                        "title" => "Redovisning för kmom01.",
                    ],
                    [
                        "text" => "Kmom02",
                        "url" => "redovisning/kmom02",
                        "title" => "Redovisning för kmom02.",
                    ],
                    [
                        "text" => "Kmom03",
                        "url" => "redovisning/kmom03",
                        "title" => "Redovisning för kmom03.",
                    ],
                    [
                        "text" => "Kmom04",
                        "url" => "redovisning/kmom04",
                        "title" => "Redovisning för kmom04.",
                    ],
                    [
                        "text" => "Kmom05",
                        "url" => "redovisning/kmom05",
                        "title" => "Redovisning för kmom05.",
                    ],
                    [
                        "text" => "Kmom06",
                        "url" => "redovisning/kmom06",
                        "title" => "Redovisning för kmom06.",
                    ],
                    [
                        "text" => "Kmom10",
                        "url" => "redovisning/kmom10",
                        "title" => "Redovisning för kmom10.",
                    ],
                ],
            ],
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
            "submenu" => [
                "items" => [
                    [
                        "text" => "Introduktion",
                        "url" => "verktyg/index",
                        "title" => "",
                    ],
                    [
                        "text" => "Innehåll",
                        "url" => "verktyg/innehall",
                        "title" => "",
                    ],
                    [
                        "text" => "Markdown",
                        "url" => "verktyg/markdown",
                        "title" => "",
                    ],
                    [
                        "text" => "Shortcode",
                        "url" => "verktyg/shortcode",
                        "title" => "",
                    ],
                    [
                        "text" => "Frontmatter",
                        "url" => "verktyg/frontmatter",
                        "title" => "",
                    ],
                    [
                        "text" => "Style och layout",
                        "url" => "verktyg/style-och-layout",
                        "title" => "",
                    ],
                    [
                        "text" => "Styleväljare",
                        "url" => "verktyg/stylevaljare",
                        "title" => "",
                    ],
                    [
                        "text" => "Vyer och templatefiler",
                        "url" => "verktyg/vyer-och-templatefiler",
                        "title" => "",
                    ],
                    [
                        "text" => "Layout och regioner",
                        "url" => "verktyg/layout-och-regioner",
                        "title" => "",
                    ],
                    [
                        "text" => "Font Awesome",
                        "url" => "verktyg/font-awesome",
                        "title" => "",
                    ],
                    [
                        "text" => "Vertikalt grid",
                        "url" => "verktyg/vertikalt-grid",
                        "title" => "",
                    ],
                    [
                        "text" => "Horisontellt grid",
                        "url" => "verktyg/horisontellt-grid",
                        "title" => "",
                    ],
                    [
                        "text" => "Bygg eget tema",
                        "url" => "verktyg/bygg-eget-tema",
                        "title" => "",
                    ],
                    [
                        "text" => "Styla en route",
                        "url" => "verktyg/styla-en-route",
                        "title" => "",
                    ],
                    [
                        "text" => "Anax ramverk",
                        "url" => "verktyg/anax-ramverk",
                        "title" => "",
                    ],
                    [
                        "text" => "Development Utilities",
                        "url" => "verktyg/development-utilities",
                        "title" => "",
                    ],
                    [
                        "text" => "Bootstrapping",
                        "url" => "verktyg/bootstrapping",
                        "title" => "bootstrapping",
                    ],
                    [
                        "text" => "Routes",
                        "url" => "verktyg/routes",
                        "title" => "",
                    ],
                    [
                        "text" => "Kontroller",
                        "url" => "verktyg/kontroller",
                        "title" => "",
                    ],
                    [
                        "text" => "Skapa en egen kontroller",
                        "url" => "verktyg/skapa-en-egen-kontroller",
                        "title" => "",
                    ],
                    [
                        "text" => "Ramverkets tjänster",
                        "url" => "verktyg/ramverkets-tjanster",
                        "title" => "",
                    ],
                    [
                        "text" => "Tjänster i en kontroller",
                        "url" => "verktyg/tjanster-i-en-kontroller",
                        "title" => "",
                    ],
                    [
                        "text" => "Anax installation",
                        "url" => "verktyg/anax-installation",
                        "title" => "",
                    ],
                    [
                        "text" => "Anax CLI",
                        "url" => "verktyg/anax-cli",
                        "title" => "",
                    ],
                    [
                        "text" => "Scaffolding",
                        "url" => "verktyg/scaffolding",
                        "title" => "",
                    ],
                    [
                        "text" => "Lägg till tema",
                        "url" => "verktyg/lagg-till-tema",
                        "title" => "",
                    ],
                ],
            ],
        ],
        [
            "text" => "<i class='fas fa-check-circle'></i> Validera IP",
            "url" => "validera-ip-adress",
            "title" => "Validera IP-adress",
            "submenu" => [
                "items" => [
                    [
                        "text" => "Introduktion",
                        "url" => "validera-ip-adress/index",
                        "title" => "",
                    ],
                    [
                        "text" => "Via PHP",
                        "url" => "validera-ip-adress/php",
                        "title" => "",
                    ],
                    [
                        "text" => "Via REST API",
                        "url" => "validera-ip-adress/rest-api",
                        "title" => "",
                    ],
                ],
            ],
        ],
        [
            "text" => "<i class='fas fa-paint-brush'></i> Styleväljare",
            "url" => "style",
            "title" => "Välj style på webbplatsen.",
        ],
    ],
];
