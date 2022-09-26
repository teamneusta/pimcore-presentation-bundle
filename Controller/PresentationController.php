<?php

namespace Neusta\Pimcore\PresentationBundle\Controller;

use Neusta\Pimcore\PresentationBundle\Renderer\PresentationRenderer;
use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Response;

class PresentationController extends FrontendController
{
    public function __construct(private readonly PresentationRenderer $presentationRenderer)
    {
    }

    public function presentationAction(): Response
    {
        return $this->render('@NeustaPimcorePresentation/Presentation/presentation.html.twig', [
            'slidesMarkup' => $this->presentationRenderer->renderPresentation($this->document),
        ]);
    }
}
