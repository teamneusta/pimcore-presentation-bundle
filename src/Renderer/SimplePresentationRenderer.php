<?php

namespace Neusta\Pimcore\PresentationBundle\Renderer;

use Pimcore\Model\Document\PageSnippet;

class SimplePresentationRenderer implements PresentationRenderer
{
    public function __construct(private readonly SlideRenderer $slideRenderer)
    {
    }

    public function renderPresentation(PageSnippet $presentation): string
    {
        $renderedSlides = [];

        foreach ($presentation->getChildren() as $slide) {
            if (!$slide instanceof PageSnippet) {
                continue;
            }

            $renderedSlides[] = $this->slideRenderer->renderSlide($slide);
        }

        return implode('', $renderedSlides);
    }
}
