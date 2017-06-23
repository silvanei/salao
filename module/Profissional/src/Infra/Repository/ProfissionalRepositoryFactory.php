<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 22/04/17
 * Time: 21:30
 */

namespace Profissional\Infra\Repository;

use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;
use Profissional\Entity\Profissional;
use Profissional\Repository\ProfissionalRepositoryInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

final class ProfissionalRepositoryFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): ProfissionalRepositoryInterface
    {

        /** @var EntityManager $em */
        $em = $container->get('doctrine.entitymanager.orm_default');

        /** @var ProfissionalRepositoryInterface $repository */
        $repository = $em->getRepository(Profissional::class);

        return $repository;
    }
}