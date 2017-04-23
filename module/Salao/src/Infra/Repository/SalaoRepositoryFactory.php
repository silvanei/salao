<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 22/04/17
 * Time: 21:31
 */

namespace Salao\Infra\Repository;

use Salao\Repository\SalaoRepository;
use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;
use Salao\Entity\Salao;
use Zend\ServiceManager\Factory\FactoryInterface;

class SalaoRepositoryFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): SalaoRepository
    {
        /** @var EntityManager $sm */
        $sm = $container->get('doctrine.entitymanager.orm_default');
        /** @var SalaoRepository $repository */
        $repository = $sm->getRepository(Salao::class);

        return $repository;
    }
}