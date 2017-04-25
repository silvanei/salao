<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 22/04/17
 * Time: 21:30
 */

namespace Salao\Infra\Repository;

use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;
use Salao\Repository\ProfissionalRepositoryInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class ProfissionalRepositoryFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): ProfissionalRepositoryInterface
    {
        /** @var EntityManager $em */
        $em = $container->get('doctrine.entitymanager.orm_default');

        return new ProfissionalRepository($em);
    }
}