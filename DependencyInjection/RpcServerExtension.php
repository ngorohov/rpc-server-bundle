<?php

namespace Timiki\Bundle\RpcServerBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class RpcServerExtension extends Extension
{
	/**
	 * {@inheritdoc}
	 */
	public function load(array $configs, ContainerBuilder $container)
	{
		$configuration = new Configuration();
		$config        = $this->processConfiguration($configuration, $configs);

		$loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
		$loader->load('services.yml');

		// paths
		$paths = [];
		foreach ($config['paths'] as $path) {
			$paths[$path['namespace']] = $path['path'];
		}

		// methods
		$methods = [];
		foreach ($config['methods'] as $method) {
			$methods[$method['name']] = $method['class'];
		}

		$container->setParameter('rpc.server.paths', $paths);
		$container->setParameter('rpc.server.methods', $methods);
		$container->setParameter('rpc.server.proxy', $config['proxy']);
	}
}
