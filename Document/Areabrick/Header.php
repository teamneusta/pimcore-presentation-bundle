<?php

namespace Neusta\Pimcore\PresentationBundle\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;

class Header extends AbstractTemplateAreabrick
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return 'Header';
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return '';
    }
}
