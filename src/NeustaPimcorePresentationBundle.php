<?php declare(strict_types=1);

namespace Neusta\Pimcore\PresentationBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;
use Pimcore\Extension\Bundle\Installer\InstallerInterface;
use Pimcore\Extension\Bundle\Traits\PackageVersionTrait;

class NeustaPimcorePresentationBundle extends AbstractPimcoreBundle
{
    use PackageVersionTrait;

    public function getPath(): string
    {
        return \dirname(__DIR__);
    }

    public function getJsPaths(): array
    {
        return [
            '/bundles/presentation/js/pimcore/startup.js',
        ];
    }

    public function getInstaller(): ?InstallerInterface
    {
        return new Installer();
    }

    protected function getComposerPackageName(): string
    {
        return 'teamneusta/pimcore-presentation-bundle';
    }
}
