<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 04/05/17
 * Time: 21:26
 */

namespace Salao\Service;

use Interop\Container\ContainerInterface;
use Salao\Repository\ServicoRepositoryInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class SalaoServiceFactory
 * @package Salao\Service
 */
class ServicoServiceFactory implements FactoryInterface
{

    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return ServicoService
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): ServicoService
    {

        $servicoRepository = $container->get(ServicoRepositoryInterface::class);

        return new ServicoService($servicoRepository);
    }
}