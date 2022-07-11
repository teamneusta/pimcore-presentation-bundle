<?php

namespace Neusta\Pimcore\PresentationBundle\Controller;

use Pimcore\Controller\FrontendController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class SnippetController extends FrontendController
{
    /**
     * @Template
     */
    public function footerAction(): array
    {
        return [];
    }
}
