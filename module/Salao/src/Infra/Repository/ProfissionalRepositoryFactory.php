<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 22/04/17
 * Time: 21:30
 */

namespace Salao\Infra\Repository;

use Salao\Repository\ProfissionalRepository;
use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;
use Salao\Entity\Profissional;
use Zend\ServiceManager\Factory\FactoryInterface;

class ProfissionalRepositoryFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): ProfissionalRepository
    {
        /** @var EntityManager $sm */
        $sm = $container->get('doctrine.entitymanager.orm_default');
        /** @var ProfissionalRepository $repository */
        $repository = $sm->getRepository(Profissional::class);

        return $repository;
    }
}