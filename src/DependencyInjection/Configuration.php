<?php declare(strict_types=1);

namespace Neusta\Pimcore\PresentationBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('neusta_pimcore_presentation');

        $treeBuilder->getRootNode()
            ->children()
                ->booleanNode('bricks')
                    ->defaultTrue()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
