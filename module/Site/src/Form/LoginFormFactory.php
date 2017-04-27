<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 18/04/17
 * Time: 21:10
 */

namespace Site\Form;

use Interop\Container\ContainerInterface;
use Site\Form\Validator\AuthenticationValidator;
use Zend\Authentication\Adapter\AbstractAdapter;
use Zend\Authentication\AuthenticationServiceInterface;
use Zend\Form\FormInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class LoginFormFactory
 * @package Site\Form
 */
final class LoginFormFactory implements FactoryInterface
{

    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return FormInterface
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) : FormInterface
    {

        $authenticationService = $container->get(AuthenticationServiceInterface::class);
        $authenticationAdapter = $container->get(AbstractAdapter::class);
        $authenticationValidator = new AuthenticationValidator($authenticationService, $authenticationAdapter);

        $validator = new LoginInputFilter($authenticationValidator);
        $form = new LoginForm('loginForm');
        $form->setInputFilter($validator);

        return $form;
    }
}