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
use Salao\Entity\Servico;
use Salao\Repository\ServicoRepositoryInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class ServicoRepositoryFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): ServicoRepositoryInterface
    {
        /** @var EntityManager $em */
        $em = $container->get('doctrine.entitymanager.orm_default');

        /** @var ServicoRepositoryInterface $repository */
        $repository = $em->getRepository(Servico::class);

        return $repository;
    }
}