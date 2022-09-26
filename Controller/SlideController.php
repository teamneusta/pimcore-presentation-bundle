<?php

namespace Neusta\Pimcore\PresentationBundle\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Response;

class SlideController extends FrontendController
{
    public function slideAction(): Response
    {
        return $this->render('@NeustaPimcorePresentation/Slide/slide.html.twig', [
            // FIXME use slide renderer
        ]);
    }
}
