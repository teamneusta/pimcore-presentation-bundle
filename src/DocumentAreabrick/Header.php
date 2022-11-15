<?php

namespace Neusta\Pimcore\PresentationBundle\DocumentAreabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;

class Header extends AbstractTemplateAreabrick
{
    public function getName(): string
    {
        return 'Header';
    }
}
