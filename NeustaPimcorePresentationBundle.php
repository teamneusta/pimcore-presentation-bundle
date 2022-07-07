<?php

namespace Neusta\Pimcore\PresentationBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;
use Pimcore\Extension\Bundle\Traits\PackageVersionTrait;

class NeustaPimcorePresentationBundle extends AbstractPimcoreBundle
{
    use PackageVersionTrait;

    public function getNiceName()
    {
        return 'Neusta Presentation Bundle';
    }

    public function getDescription()
    {
        return 'Allows to turn Pages into Presentations';
    }

    protected function getComposerPackageName(): string
    {
        return 'neusta/pimcore-presentation-bundle';
    }

    public function getJsPaths()
    {
        return [
            '/bundles/presentation/js/pimcore/startup.js'
        ];
    }

    public function getInstaller()
    {
        return new Installer();
    }
}
