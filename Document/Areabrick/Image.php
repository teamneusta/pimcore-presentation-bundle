<?php

namespace Neusta\Pimcore\PresentationBundle\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;

class Image extends AbstractTemplateAreabrick
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return 'Image';
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return '';
    }
}
