<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 22/04/17
 * Time: 12:32
 */

namespace Security;

use Security\Listener\DispatchErrorEventListener;
use Security\Listener\DispatchEventListener;
use Zend\EventManager\EventInterface;
use Zend\EventManager\EventManager;
use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ConfigProviderInterface, BootstrapListenerInterface
{

    public function onBootstrap(EventInterface $e)
    {

        /** @var EventManager $eventManager */
        $eventManager = $e->getApplication()->getEventManager();

        (new DispatchEventListener())->attach($eventManager);
        (new DispatchErrorEventListener())->attach($eventManager);

    }

    public function getConfig(): array
    {
        return include __DIR__ . '/../config/module.config.php';
    }
}