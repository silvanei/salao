<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 30/04/17
 * Time: 21:24
 */

namespace Security\Listener;

use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateTrait;
use Zend\Http\Response;
use Zend\Mvc\MvcEvent;
use Zend\View\Model\ViewModel;

class DispatchErrorEventListener
{

    use ListenerAggregateTrait;

    public function attach(EventManagerInterface $events)
    {
        $this->listeners[] = $events->attach(MvcEvent::EVENT_DISPATCH_ERROR, [$this, 'onUnauthorised'], -10);
    }

    public function onUnauthorised(MvcEvent $event) {
        // do nothing if no error in the event
        $error = $event->getError();
        if (empty($error)) {
            return;
        }
        // do nothing if the result is a response object
        $result = $event->getResult();
        if ($result instanceof Response) {
            return;
        }
        if ($event->getError() == 'error-unauthorized') {
            $model = new ViewModel(array(
                'message' => 'An error occurred during execution; please try again later.'
            ));
            $model->setTemplate('error/401');
            $event->setResult($model);
            $response = $event->getResponse() ?: new Response();
            $response->setStatusCode(401);
            $event->setResponse($response);
        }
    }
}