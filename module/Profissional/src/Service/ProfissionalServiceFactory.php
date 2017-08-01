<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 23/06/2017
 * Time: 12:48
 */

namespace Profissional\Service;

use Interop\Container\ContainerInterface;
use Profissional\Repository\ProfissionalRepositoryInterface;
use Salao\Repository\ServicoRepositoryInterface;
use Zend\Authentication\AuthenticationServiceInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class ProfissionalServiceFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): ProfissionalService
    {

        $profissionalRepository = $container->get(ProfissionalRepositoryInterface::class);
        $servicoRepository = $container->get(ServicoRepositoryInterface::class);
        $authenticationService = $container->get(AuthenticationServiceInterface::class);

        return new ProfissionalService($profissionalRepository, $servicoRepository, $authenticationService->getIdentity());
    }
}