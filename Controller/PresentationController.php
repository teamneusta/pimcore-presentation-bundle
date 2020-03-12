<?php

namespace Neusta\Pimcore\PresentationBundle\Controller;

use Pimcore\Model\Document;

class PresentationController extends AbstractFrontendController
{
    /** @var string */
    const SECTION_START_TAG = '<section>';
    const SECTION_END_TAG = '</section>';

    public function presentationAction()
    {
        $slidesMarkup = '';

        $slides = $this->document->getChildren();
        if (count($slides) > 0) {
            $slidesMarkup = $this->renderSlides($slides);
        }

        $this->view->slidesMarkup = $slidesMarkup;
    }

    /**
     * @param Document/Page $slide
     * @return string
     */
    private function renderSlides(array $slides): string
    {
        $slideMarkup = '';

        foreach ($slides as $slide) {
            if ($slide instanceof Document\Page) {
                $backgroundImagePath = $this->getBackgroundImageURL($slide);
                $subSlides = $slide->getChildren();

                /** @var string $sectionStartTag */
                $sectionStartTag = $this->getStartTag($backgroundImagePath, count($subSlides));

                if (count($subSlides) === 0) {
                    $slideMarkup .= $sectionStartTag . $this->renderDocument($slide) . self::SECTION_END_TAG;
                } else {
                    $slideMarkup .= $sectionStartTag . $this->renderDocument($slide) . self::SECTION_END_TAG;
                    $slideMarkup .= $this->renderSlides($subSlides);
                    $slideMarkup .= self::SECTION_END_TAG;
                }
            }
        }

        return $slideMarkup;
    }

    private function renderDocument(Document\Page $page): string
    {
        $view = $this->view->getAllParameters();
        $view['document'] = $page;

        $template = str_replace('/BE/', '/FE/', $page->getTemplate());

        return $this->renderView($template, $view);
    }

    /**
     * @param Document\Page $slide
     * @return string
     */
    private function getBackgroundImageURL(Document\Page $slide): string
    {
        $backgroundImagePath = '';
        /**
         * @var \Pimcore\Model\Document\Tag\Image
         */
        $backgroundImageBlock = $slide->getElement('background-image');
        /** @var \Pimcore\Model\Asset\Image $backgroundImage */
        if ($backgroundImageBlock !== null) {
            $backgroundImage = $backgroundImageBlock->getImage();
            if ($backgroundImage !== null) {
                $backgroundImagePath = 'data-background-image="/var/assets' . $backgroundImage->getRealFullPath() . '"';
            }
        }
        return $backgroundImagePath;
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
}
