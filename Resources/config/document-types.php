<?php

use Neusta\Pimcore\PresentationBundle\Controller\PresentationController;
use Neusta\Pimcore\PresentationBundle\Controller\SlideController;
use Neusta\Pimcore\PresentationBundle\Controller\SnippetController;

return [
    1000 => [
        "id" => 1000,
        "name" => "Slide",
        "group" => "presentation",
        "module" => null,
        "controller" => SlideController::class . '::slideAction',
        "template" => "@NeustaPimcorePresentation/Slide/slide.html.twig",
        "type" => "page",
        "priority" => 0,
        "creationDate" => 1583233050,
        "modificationDate" => 1583836961
    ],
    1001 => [
        "id" => 1001,
        "name" => "Presentation",
        "group" => "presentation",
        "module" => null,
        "controller" => PresentationController::class . '::presentationAction',
        "template" => "@NeustaPimcorePresentation/Presentation/presentation.html.twig",
        "type" => "page",
        "priority" => 0,
        "creationDate" => 1583233454,
        "modificationDate" => 1583836949
    ],
    1002 => [
        "id" => 1002,
        "name" => "Slide footer",
        "group" => "presentation",
        "module" => null,
        "controller" => SnippetController::class . '::footerAction',
        "template" => "@NeustaPimcorePresentation/Snippet/footer.html.twig",
        "type" => "snippet",
        "priority" => 0,
        "creationDate" => 1583406926,
        "modificationDate" => 1583836970
    ]
];
