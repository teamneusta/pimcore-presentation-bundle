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
    public function defaultAction(): array
    {
        return [
            'revealJsPublicPath' => $this->revealJsPublicPath,
        ];
    }
}
