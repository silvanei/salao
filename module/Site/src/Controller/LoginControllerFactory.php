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
use Site\Form\LoginInputFilter;
use Zend\Authentication\AuthenticationServiceInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\ServiceManager\Factory\FactoryInterface;

class LoginControllerFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): AbstractActionController
    {

        $service = $container->get(AuthenticationServiceInterface::class);

        $validator = new LoginInputFilter();
        $form = new LoginForm('loginForm');
        $form->setInputFilter($validator);

        return new LoginController($form, $service);
    }
}