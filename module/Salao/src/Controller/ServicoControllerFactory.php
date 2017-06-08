<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 18/04/17
 * Time: 21:20
 */

namespace Salao\Controller;

use Interop\Container\ContainerInterface;
use Salao\Service\ServicoService;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\ServiceManager\Factory\FactoryInterface;

class ServicoControllerFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): AbstractActionController
    {
        $servicoService = $container->get(ServicoService::class);
        return new ServicoController($servicoService);
    }
}