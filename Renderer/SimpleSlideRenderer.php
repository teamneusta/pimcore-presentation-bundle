<?php

namespace Neusta\Pimcore\PresentationBundle\Renderer;

use Pimcore\Model\Document\PageSnippet;
use Twig\Environment;

class SimpleSlideRenderer implements SlideRenderer
{
    public function __construct(private readonly Environment $twig)
    {
    }

    public function renderSlide(PageSnippet $slide): string
    {
        $slideMarkup = $this->renderDocument($slide);
        foreach ($slide->getChildren() ?? [] as $subSlide) {
            $slideMarkup .= $this->renderSlide($subSlide);
        }

        return $slideMarkup;
    }

    private function renderDocument(PageSnippet $page): string
    {
        $template = '@NeustaPimcorePresentation/Slide/partial.html.twig';

        $documentBackup = $this->twig->getGlobals()['document'];
        $this->twig->addGlobal('document', $page);
        $rendered = $this->twig->render($template, ['document' => $page]);
        $this->twig->addGlobal('document', $documentBackup);

        return $rendered;
    }
}
