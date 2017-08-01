<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 30/07/2017
 * Time: 12:55
 */

namespace Profissional\Controller;

use Interop\Container\ContainerInterface;
use Profissional\Service\ProfissionalService;
use Zend\ServiceManager\Factory\FactoryInterface;

final class ProfissionalServicoControllerFactory implements FactoryInterface
{


    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): ProfissionalServicoController
    {

        $profissionalService = $container->get(ProfissionalService::class);
        return new ProfissionalServicoController($profissionalService);
    }
}