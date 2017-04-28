<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 27/04/17
 * Time: 22:22
 */

namespace Site\Controller;

use Common\Controller\AbstractController;
use Interop\Container\ContainerInterface;
use Zend\Authentication\AuthenticationServiceInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class LogoutControllerFactory
 * @package Site\Controller
 */
final class LogoutControllerFactory implements FactoryInterface
{

    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return AbstractController
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): AbstractController
    {

        return new LogoutController($container->get(AuthenticationServiceInterface::class));
    }
}