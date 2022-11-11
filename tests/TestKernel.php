<?php declare(strict_types=1);

namespace Neusta\Pimcore\PresentationBundle\Tests;

use Neusta\Pimcore\PresentationBundle\NeustaPimcorePresentationBundle;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel;

/**
 * Adapted by https://github.com/bernardosecades/tips-and-tricks/tree/master/functional-test-standalone-bundle
 * in the path Tests/AppKernel.php.
 */
class TestKernel extends Kernel
{
    public function registerBundles(): array
    {
        $bundles = [];

        if ('test' === $this->getEnvironment()) {
            $bundles[] = new NeustaPimcorePresentationBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader): void
    {
        $loader->load(__DIR__ . '/../config/services.yaml');
    }

    /**
     * {@inheritdoc}
     */
    public function getCacheDir(): string
    {
        return sys_get_temp_dir() . '/NeustaPimcorePresentationBundle/cache';
    }

    /**
     * {@inheritdoc}
     */
    public function getLogDir(): string
    {
        return sys_get_temp_dir() . '/NeustaPimcorePresentationBundle/logs';
    }
}
