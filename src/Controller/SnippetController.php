<?php declare(strict_types=1);

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
