<?php

namespace Timiki\Bundle\RpcServerBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\EventDispatcher\DependencyInjection\RegisterListenersPass;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Timiki\Bundle\RpcServerBundle\DependencyInjection\Compiler\RpcMethodPass;

class RpcServerBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(
            new RegisterListenersPass(
                'rpc.server.event_dispatcher',
                'rpc.server.event_listener',
                'rpc.server.event_subscriber'
            )
        );
        // Compile prc methods
        $container->addCompilerPass(new RpcMethodPass());
    }
}
