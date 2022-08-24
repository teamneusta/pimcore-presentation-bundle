<?php

namespace Neusta\Pimcore\PresentationBundle\Renderer;

use Pimcore\Model\Document\PageSnippet;

interface SlideRenderer
{
    public function renderSlide(PageSnippet $slide): string;
}
