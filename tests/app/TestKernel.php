<?php declare(strict_types=1);

use Neusta\Pimcore\PresentationBundle\NeustaPimcorePresentationBundle;
use Neusta\Pimcore\TestingFramework\Kernel\TestKernel as TestingFrameworkTestKernel;
use Pimcore\HttpKernel\BundleCollection\BundleCollection;

class TestKernel extends TestingFrameworkTestKernel
{
    public function registerBundlesToCollection(BundleCollection $collection): void
    {
        $collection->addBundle(new NeustaPimcorePresentationBundle());
    }
}
