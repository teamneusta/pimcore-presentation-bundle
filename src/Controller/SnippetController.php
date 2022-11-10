<?php

namespace Neusta\Pimcore\PresentationBundle\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Response;

class SnippetController extends FrontendController
{
    public function footerAction(): Response
    {
        return $this->render('@NeustaPimcorePresentation/Snippet/footer.html.twig', []);
    }
}
