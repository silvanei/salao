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
use Zend\Mvc\Controller\AbstractActionController;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class LoginControllerFactory
 * @package Site\Controller
 */
final class LoginControllerFactory implements FactoryInterface
{

    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return AbstractActionController
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): AbstractActionController
    {

        $form = $container->get(LoginForm::class);

        return new LoginController($form);
    }
}