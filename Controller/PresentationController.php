<?php

namespace Neusta\Pimcore\PresentationBundle\Controller;

use Neusta\Pimcore\PresentationBundle\Renderer\PresentationRenderer;
use Pimcore\Controller\FrontendController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class PresentationController extends FrontendController
{
    public function __construct(private readonly PresentationRenderer $presentationRenderer)
    {
    }

    /**
     * @Template
     */
    public function presentationAction(): array
    {
        return [
            'slidesMarkup' => $this->presentationRenderer->renderPresentation($this->document),
        ];
    }
}
