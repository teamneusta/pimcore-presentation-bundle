<?php

namespace Neusta\Pimcore\PresentationBundle\Controller;

use Pimcore\Controller\FrontendController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class SlideController extends FrontendController
{
    public function __construct()
    {
    }

    /**
     * @Template
     */
    public function slideAction(): array
    {
        return [
            // FIXME use slide renderer
        ];
    }
}
