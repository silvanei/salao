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
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {

        /** @var EntityManager $em */
        $em = $container->get('doctrine.entitymanager.orm_default');

        return $em->getRepository(Acesso::class);
    }

}