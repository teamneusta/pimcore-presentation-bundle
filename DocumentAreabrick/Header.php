<?php

namespace Neusta\Pimcore\PresentationBundle\DocumentAreabrick;

use Neusta\Pimcore\PresentationBundle\DocumentAreabrick\Base\AbstractConfigurableAreabrick;

class Header extends AbstractConfigurableAreabrick
{
    public function getName(): string
    {
        return 'Header';
    }
}
