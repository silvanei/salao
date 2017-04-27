<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 18/04/17
 * Time: 21:20
 */

namespace Site\Controller;

use Interop\Container\ContainerInterface;
use Site\Form\LoginForm;
use Zend\Authentication\Adapter\AbstractAdapter;
use Zend\Authentication\AuthenticationServiceInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\ServiceManager\Factory\FactoryInterface;

class LoginControllerFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): AbstractActionController
    {

        $authenticationService = $container->get(AuthenticationServiceInterface::class);
        $authenticationAdapter = $container->get(AbstractAdapter::class);
        $form = $container->get(LoginForm::class);

        return new LoginController($form, $authenticationService, $authenticationAdapter);
    }
}