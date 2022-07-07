<?php

namespace Neusta\Pimcore\PresentationBundle\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;

class Wysiwyg extends AbstractTemplateAreabrick
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return 'Wysiwyg';
    }
}
