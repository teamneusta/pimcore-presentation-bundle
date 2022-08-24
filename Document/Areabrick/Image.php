<?php

namespace Neusta\Pimcore\PresentationBundle\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;

class Image extends AbstractTemplateAreabrick
{
    public function getName(): string
    {
        return 'Image';
    }
}
