<?php

namespace Neusta\Pimcore\PresentationBundle\Controller;

use Pimcore\Controller\FrontendController as PimcoreFrontendController;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;

class AbstractFrontendController extends PimcoreFrontendController
{

    /**
     * @inheritDoc
     * @param FilterControllerEvent $event
     */
    public function onKernelController(FilterControllerEvent $event)
    {
        // enable twig auto-rendering
        // https://pimcore.com/docs/6.x/Development_Documentation/MVC/Template/Twig.html
        $this->setViewAutoRender($event->getRequest(), true, 'twig');
    }
}
