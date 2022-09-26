<?php

namespace Neusta\Pimcore\PresentationBundle\DocumentAreabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;

class Code extends AbstractTemplateAreabrick
{
    public function getName(): string
    {
        return 'Code';
    }
}
