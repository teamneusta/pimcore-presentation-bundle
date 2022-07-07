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
        $backgroundImagePath = $this->getBackgroundImageURL($slide);
        $subSlides = $slide->getChildren() ?? [];

        $sectionStartTag = $this->getStartTag($backgroundImagePath, count($subSlides));

        $slideMarkup = '';
        if (count($subSlides) === 0) {
            $slideMarkup .= $sectionStartTag . $this->renderDocument($slide) . self::SECTION_END_TAG;
        } else {
            $slideMarkup .= $sectionStartTag . $this->renderDocument($slide) . self::SECTION_END_TAG;
            foreach ($subSlides as $subSlide) $slideMarkup .= $this->renderSlide($subSlide);
            $slideMarkup .= self::SECTION_END_TAG;
        }
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

    private function getStartTag(string $backgroundImagePath, int $numberOfSubSlides): string
    {
        $startTag = self::SECTION_START_TAG;

        if ($numberOfSubSlides === 0) {
            $startTag = str_replace('>', ' ' . $backgroundImagePath . '>', $startTag);
        } else {
            $startTag .= '<section ' . $backgroundImagePath . '>';
        }

        return $startTag;
    }

    private function renderDocument(PageSnippet $page): string
    {
//        $templatePath = $page->getTemplate();
        $templatePath = '@NeustaPimcorePresentation/Slide/slide.html.twig';
        $template = str_replace('/BE/', '/FE/', $templatePath ?? '');

        $documentBackup = $this->twig->getGlobals()['document'];
        $this->twig->addGlobal('document', $page);
        $rendered = $this->twig->render($template, ['document' => $page]);
        $this->twig->addGlobal('document', $documentBackup);

        return $rendered;
    }
}
