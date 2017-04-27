<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 26/04/17
 * Time: 21:49
 */

namespace Security\Authentication;

use Interop\Container\ContainerInterface;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\AuthenticationServiceInterface;
use Zend\Authentication\Storage\Session;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class AuthenticationServiceFactory
 * @package Security\Authentication
 */
final class AuthenticationServiceFactory implements FactoryInterface
{

    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return AuthenticationServiceInterface
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): AuthenticationServiceInterface
    {
        return new AuthenticationService(
            new Session('Salao_Auth')
        );
    }
}