<?php

namespace Neusta\Pimcore\PresentationBundle\Controller;

use Neusta\Pimcore\PresentationBundle\Renderer\PresentationRenderer;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class PresentationController extends AbstractFrontendController
{
    public function __construct(
        private readonly string $revealJsPublicPath,
        private readonly PresentationRenderer $presentationRenderer
    ) {
    }

    /**
     * @Template()
     */
    public function presentationAction(): array
    {
        return [
            'revealJsPublicPath' => $this->revealJsPublicPath,
            'slidesMarkup' => $this->presentationRenderer->renderPresentation($this->document),
        ];
    }
}
