<?php declare(strict_types=1);

namespace Neusta\Pimcore\PresentationBundle\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;

class NeustaPresentationTextarea extends AbstractTemplateAreabrick
{
    public function getName(): string
    {
        return 'Neusta Presentation Textarea';
    }
}
