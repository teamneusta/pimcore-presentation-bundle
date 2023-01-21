<?php

namespace Neusta\Pimcore\PresentationBundle\DocumentAreabrick\Base;

use Neusta\Pimcore\EditorConfigBundle\Document\EditableDialogBox\DialogBoxBuilder;
use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;
use Pimcore\Extension\Document\Areabrick\EditableDialogBoxInterface;
use Pimcore\Model\Document\Editable;
use Pimcore\Model\Document\Editable\Area\Info;

class AbstractConfigurableAreabrick extends AbstractTemplateAreabrick implements EditableDialogBoxInterface
{
    /** @template-use HasDialogBox<DialogBoxBuilder> */
    use HasDialogBox;

    protected function createDialogBoxBuilder(Editable $area, ?Info $info): DialogBoxBuilder
    {
        return new DialogBoxBuilder();
    }

    protected function buildDialogBox(DialogBoxBuilder $dialogBox, Editable $area, ?Info $info): void
    {
        $dialogBox
            ->addTab('Fragment Settings',
                $dialogBox->createSelect(
                    'fragment-style',
                    [
                        'none' => 'none',
                        'fade-in' => 'fade in',
                        'fade-out' => 'fade out',
                        'fade-up' => 'fade up',
                        'fade-in-then-out' => 'fade in then out',
                        'fade-in-then-semi-out' => 'fade in then semi out',
                        'grow' => 'grow',
                        'shrink' => 'shrink',
                        'strike' => 'strike',
                        'highlight-current-blue' => 'highlight current blue',
                        'highlight-red' => 'highlight red',
                        'highlight-blue' => 'highlight blue',
                        'highlight-green' => 'highlight green',
                    ]
                )
                    ->setLabel('Fragments Style')
                    ->setDefaultValue('none'),
                $dialogBox->createNumeric('fragments-order', 0, 20),
            );
    }


}