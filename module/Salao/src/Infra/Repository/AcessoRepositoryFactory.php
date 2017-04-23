<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 22/04/17
 * Time: 21:28
 */

namespace Salao\Infra\Repository;

use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;
use Salao\Entity\Acesso;
use Zend\ServiceManager\Factory\FactoryInterface;

class AcessoRepositoryFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): AcessoRepository
    {

        /** @var EntityManager $sm */
        $sm = $container->get('doctrine.entitymanager.orm_default');
        /** @var AcessoRepository $repository */
        $repository = $sm->getRepository(Acesso::class);

        return $repository;
    }

}