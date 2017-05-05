<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 04/05/17
 * Time: 21:26
 */

namespace Salao\Service;

use Common\Persistence\DoctrineTransactionManager;
use Interop\Container\ContainerInterface;
use Salao\Repository\SalaoRepositoryInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class SalaoServiceFactory
 * @package Salao\Service
 */
class SalaoServiceFactory implements FactoryInterface
{

    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return SalaoService
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): SalaoService
    {

        $transactionManager = new DoctrineTransactionManager($container->get('doctrine.entitymanager.orm_default'));
        $salaoRepository = $container->get(SalaoRepositoryInterface::class);

        return new SalaoService($transactionManager, $salaoRepository);
    }
}