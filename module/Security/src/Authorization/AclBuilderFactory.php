<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 01/05/17
 * Time: 19:56
 */

namespace Security\Authorization;

use Interop\Container\ContainerInterface;
use Zend\Permissions\Acl\Acl;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class AclBuilderFactory
 * @package Security\Authorization
 */
class AclBuilderFactory implements FactoryInterface
{

    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return Acl
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): Acl
    {
        $config = $container->get('config');
        if (!isset($config['acl'])) {
            throw new ServiceNotCreatedException('Informar as regras de ACL para a API.');
        }
        $acl = $config['acl'];

        return (new AclBuilder($acl))->build();
    }
}