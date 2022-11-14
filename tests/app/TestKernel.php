<?php declare(strict_types=1);

use Neusta\Pimcore\PresentationBundle\NeustaPimcorePresentationBundle;
use Pimcore\HttpKernel\BundleCollection\BundleCollection;
use Pimcore\Kernel;

/**
 * Adapted by https://github.com/bernardosecades/tips-and-tricks/tree/master/functional-test-standalone-bundle
 * in the path Tests/AppKernel.php.
 */
class TestKernel extends Kernel
{
    public function registerBundlesToCollection(BundleCollection $collection): void
    {
        $collection->addBundle(new NeustaPimcorePresentationBundle());
    }
}
