<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 25/04/2017
 * Time: 15:39
 */

namespace Common\View\Helper;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class FlashNotifyFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): FlashNotify
    {
        return new FlashNotify(
            $container->get('ControllerPluginManager')->get('flashmessenger'),
            $container->get('ViewHelperManager')->get('inlinescript')
        );
    }

}