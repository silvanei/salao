<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 30/04/17
 * Time: 21:24
 */

namespace Security\Listener;

use Security\Authorization\AclBuilder;
use Security\Authorization\Role;
use Site\Controller\LoginController;
use Zend\Authentication\AuthenticationServiceInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateTrait;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\MvcEvent;
use Zend\Permissions\Acl\Acl;
use Zend\Stdlib\ArrayObject;
use Zend\Stdlib\ArrayUtils;

class DispatchEventListener
{

    use ListenerAggregateTrait;

    public function attach(EventManagerInterface $events)
    {
        $this->listeners[] = $events->getSharedManager()->attach(AbstractActionController::class, MvcEvent::EVENT_DISPATCH, [$this, 'onDispatchAuthentication'], 1001);
        $this->listeners[] = $events->getSharedManager()->attach(AbstractActionController::class, MvcEvent::EVENT_DISPATCH, [$this, 'onDispatchAuthorization'], 1000);
    }

    public function onDispatchAuthentication(MvcEvent $event)
    {

        $controller = $event->getRouteMatch()->getParam('controller');
        $action = $event->getRouteMatch()->getParam('action');
        $resource = sprintf(Role::RESOURCE_FORMAT, $controller, $action);

        /**
         * @var AuthenticationServiceInterface $auth
         * @var Acl $acl
         */
        $auth = $event->getApplication()->getServiceManager()->get(AuthenticationServiceInterface::class);
        $acl = $event->getApplication()->getServiceManager()->get(AclBuilder::class);

        if ($acl->isAllowed(Role::GUEST, $resource)) {
            $auth->clearIdentity();
            return null;
        }

        if ($auth->hasIdentity()) {
            $event->setParam(Role::USER_ROLE_PARAN, $auth->getIdentity()->getPerfil());
            return null;
        }

        /** @var AbstractActionController $target */
        $target = $event->getTarget();
        return $target->redirect()->toRoute(LoginController::ROUTE_NAME);

    }

    public function onDispatchAuthorization(MvcEvent $event)
    {

        $controller = $event->getRouteMatch()->getParam('controller');
        $action = $event->getRouteMatch()->getParam('action');
        $resource = sprintf(Role::RESOURCE_FORMAT, $controller, $action);
        $userRole = $event->getParam(Role::USER_ROLE_PARAN, Role::GUEST);

        /** @var Acl $acl */
        $acl = $event->getApplication()->getServiceManager()->get(AclBuilder::class);

        if ($acl->isAllowed($userRole, $resource)) {
            return null;
        }

        $event->setName(MvcEvent::EVENT_DISPATCH_ERROR);
        $event->setError('error-unauthorized');
        $event->setController($controller);
        $event->setControllerClass($event->getTarget());

        $return = $event->getApplication()->getEventManager()->triggerEvent($event)->last();
        if (! $return) {
            $return = $event->getResult();
        }

        return $this->complete($return, $event);

    }

    protected function complete($return, MvcEvent $event)
    {
        if (!is_object($return)) {
            if (ArrayUtils::hasStringKeys($return)) {
                $return = new ArrayObject($return, ArrayObject::ARRAY_AS_PROPS);
            }
        }
        $event->setResult($return);
        return $return;
    }
}