<?php

namespace Neusta\Pimcore\PresentationBundle\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;

class Code extends AbstractTemplateAreabrick
{
    public function getName(): string
    {
        return 'Code';
    }
}
