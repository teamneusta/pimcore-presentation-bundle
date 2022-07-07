<?php

namespace Neusta\Pimcore\PresentationBundle\Renderer;

use Pimcore\Model\Asset;
use Pimcore\Model\Document\Editable;
use Pimcore\Model\Document\PageSnippet;
use Twig\Environment;

class SimpleSlideRenderer implements SlideRenderer
{
    private const SECTION_START_TAG = '<section>';
    private const SECTION_END_TAG = '</section>';

    public function __construct(private readonly Environment $twig)
    {
    }

    public function renderSlide(PageSnippet $slide): string
    {
        $slideMarkup = $this->getStartTag($this->getBackgroundImageURL($slide));
        $slideMarkup .= $this->renderDocument($slide);
        foreach ($slide->getChildren() ?? [] as $subSlide) {
            $slideMarkup .= $this->renderSlide($subSlide);
        }
        $slideMarkup .= self::SECTION_END_TAG;

        return $slideMarkup;
    }

    private function getBackgroundImageURL(PageSnippet $slide): string
    {
        $backgroundImage = $this->getBackgroundImage($slide);
        if ($backgroundImage !== null) {
            return sprintf(
                'data-background-image="/var/assets%s"',
                $backgroundImage->getRealFullPath()
            );
        }

        return '';
    }

    private function getBackgroundImage(PageSnippet $slide): ?Asset\Image
    {
        $backgroundImageEditable = $slide->getEditable('background-image');
        if (!$backgroundImageEditable instanceof Editable\Image) {
            return null;
        }

        return $backgroundImageEditable->getImage();
    }

    private function getStartTag(string $backgroundImagePath): string
    {
        if ('' === $backgroundImagePath) {
            return self::SECTION_START_TAG;
        }

        return str_replace('>', ' ' . $backgroundImagePath . '>', self::SECTION_START_TAG);
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
