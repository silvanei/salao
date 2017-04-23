<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 22/04/17
 * Time: 20:11
 */

namespace Site\Infra\Service;

use Interop\Container\ContainerInterface;
use Salao\Repository\AcessoRepository;
use Salao\Repository\ProfissionalRepository;
use Salao\Repository\SalaoRepository;
use Zend\ServiceManager\Factory\FactoryInterface;

class CadastroServiceFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {

        $salaoRepository = $container->get(SalaoRepository::class);
        $profissionalRepository = $container->get(ProfissionalRepository::class);
        $acessoRepository = $container->get(AcessoRepository::class);

        return new CadastroService($salaoRepository, $profissionalRepository, $acessoRepository);
    }
}