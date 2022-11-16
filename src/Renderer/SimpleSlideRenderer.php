<?php declare(strict_types=1);

namespace Neusta\Pimcore\PresentationBundle\Renderer;

use Pimcore\Model\Document;
use Twig\Environment;

class SimpleSlideRenderer implements SlideRenderer
{
    public function __construct(private readonly Environment $twig)
    {
    }

    public function renderSlide(Document $slide): string
    {
        $slideMarkup = $this->renderDocument($slide);
        foreach ($slide->getChildren() as $subSlide) {
            $slideMarkup .= $this->renderSlide($subSlide);
        }

        return $slideMarkup;
    }

    private function renderDocument(Document $page): string
    {
        $template = '@NeustaPimcorePresentation/Slide/partial.html.twig';

        $documentBackup = $this->twig->getGlobals()['document'];
        $this->twig->addGlobal('document', $page);
        $rendered = $this->twig->render($template, ['document' => $page]);
        $this->twig->addGlobal('document', $documentBackup);

        return $rendered;
    }
}
