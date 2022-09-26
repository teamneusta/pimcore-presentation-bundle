<?php

namespace Neusta\Pimcore\PresentationBundle\DocumentAreabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;

class Image extends AbstractTemplateAreabrick
{
    public function getName(): string
    {
        return 'Image';
    }
}
