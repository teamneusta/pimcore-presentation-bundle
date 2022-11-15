<?php declare(strict_types=1);

namespace Neusta\Pimcore\PresentationBundle\Renderer;

use Pimcore\Model\Document\PageSnippet;

interface PresentationRenderer
{
    public function renderPresentation(PageSnippet $presentation): string;
}
