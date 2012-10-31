<?php

namespace Enroporra\EnroporraBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{

    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('enroporra');

        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.
        $rootNode
            ->children()
            ->scalarNode('banner')->defaultValue(rand(1,12))->end()
            ->scalarNode('lolailo')->defaultValue("like a configuration boss")->end()
            ->end();

        /*$rootNode
            ->children()
            ->scalarNode('lolailo')->defaultValue("like a superboss")->end()
            ->end();*/

        return $treeBuilder;
    }

}
