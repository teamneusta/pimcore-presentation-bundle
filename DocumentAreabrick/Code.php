<?php

namespace Neusta\Pimcore\PresentationBundle\DocumentAreabrick;

use Neusta\Pimcore\PresentationBundle\DocumentAreabrick\Base\AbstractConfigurableAreabrick;

class Code extends AbstractConfigurableAreabrick
{
    public function getName(): string
    {
        return 'Code';
    }
}
