<?php

namespace Neusta\Pimcore\PresentationBundle\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;

class Textarea extends AbstractTemplateAreabrick
{
    public function getName(): string
    {
        return 'Textarea';
    }
}
