<?php

namespace Neusta\Pimcore\PresentationBundle\Document\Areabrick;

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
