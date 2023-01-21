<?php declare(strict_types=1);

namespace Neusta\Pimcore\PresentationBundle\DocumentAreabrick;

use Neusta\Pimcore\PresentationBundle\DocumentAreabrick\Base\AbstractConfigurableAreabrick;

class Textarea  extends AbstractConfigurableAreabrick
{
    public function getName(): string
    {
        return 'Textarea';
    }
}
