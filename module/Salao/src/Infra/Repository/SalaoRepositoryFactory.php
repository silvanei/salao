<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 22/04/17
 * Time: 21:31
 */

namespace Salao\Infra\Repository;

use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;
use Salao\Entity\Salao;
use Salao\Repository\SalaoRepositoryInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class SalaoRepositoryFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): SalaoRepositoryInterface
    {
        /** @var EntityManager $em */
        $em = $container->get('doctrine.entitymanager.orm_default');

        /** @var SalaoRepositoryInterface $repository */
        $repository = $em->getRepository(Salao::class);

        return $repository;
    }
}