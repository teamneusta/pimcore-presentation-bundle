<?php

return [
    1000 => [
        "id" => 1000,
        "name" => "Slide",
        "group" => "presentation",
        "module" => NULL,
        "controller" => "@AppBundle\\Controller\\DefaultController",
        "action" => "default",
        "template" => "PresentationBundle:Slides/Layouts/BE:slide.html.twig",
        "type" => "page",
        "priority" => 0,
        "creationDate" => 1583233050,
        "modificationDate" => 1583836961
    ],
    1001 => [
        "id" => 1001,
        "name" => "Presentation",
        "group" => "presentation",
        "module" => NULL,
        "controller" => "@Neusta\\Pimcore\\PresentationBundle\\Controller\\PresentationController",
        "action" => "presentation",
        "template" => "PresentationBundle:Presentation:presentation.html.twig",
        "type" => "page",
        "priority" => 0,
        "creationDate" => 1583233454,
        "modificationDate" => 1583836949
    ],
    1002 => [
        "id" => 1002,
        "name" => "Slide footer",
        "group" => "presentation",
        "module" => NULL,
        "controller" => "@Neusta\\Pimcore\\PresentationBundle\\Controller\\SnippetController",
        "action" => "footer",
        "template" => "PresentationBundle:snippet:footer.html.twig",
        "type" => "snippet",
        "priority" => 0,
        "creationDate" => 1583406926,
        "modificationDate" => 1583836970
    ]
];
