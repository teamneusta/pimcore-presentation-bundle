<?php

namespace Neusta\Pimcore\PresentationBundle\Controller;

use Pimcore\Controller\FrontendController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class SlideController extends FrontendController
{
    public function __construct(private readonly string $revealJsPublicPath)
    {
    }

    /**
     * @Template()
     */
    public function slideAction(): array
    {
        return [
            'revealJsPublicPath' => $this->revealJsPublicPath,
        ];
    }
}
