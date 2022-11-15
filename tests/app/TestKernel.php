<?php declare(strict_types=1);

use Neusta\Pimcore\PresentationBundle\NeustaPimcorePresentationBundle;
use Pimcore\HttpKernel\BundleCollection\BundleCollection;
use Pimcore\Kernel;

class TestKernel extends Kernel
{
    public function registerBundlesToCollection(BundleCollection $collection): void
    {
        $collection->addBundle(new NeustaPimcorePresentationBundle());
    }
}
