<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 22/04/17
 * Time: 20:11
 */

namespace Site\Service;

use Common\Persistence\DoctrineTransactionManager;
use Interop\Container\ContainerInterface;
use Salao\Repository\AcessoRepositoryInterface;
use Salao\Repository\ProfissionalRepositoryInterface;
use Salao\Repository\SalaoRepositoryInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class CadastroServiceFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): CadastroService
    {

        $salaoRepository = $container->get(SalaoRepositoryInterface::class);
        $profissionalRepository = $container->get(ProfissionalRepositoryInterface::class);
        $acessoRepository = $container->get(AcessoRepositoryInterface::class);

        return new CadastroService(
            new DoctrineTransactionManager($container->get('doctrine.entitymanager.orm_default')),
            $salaoRepository,
            $profissionalRepository,
            $acessoRepository
        );
    }
}