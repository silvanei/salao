<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 18/04/17
 * Time: 21:20
 */

namespace Salao\Controller;

use Interop\Container\ContainerInterface;
use Salao\Form\ServicoForm;
use Salao\Form\ServicoInputFilter;
use Salao\Service\ServicoService;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\ServiceManager\Factory\FactoryInterface;

class ServicoControllerFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): AbstractActionController
    {
        $servicoService = $container->get(ServicoService::class);
        $inputFilter = new ServicoInputFilter();
        $form = new ServicoForm('servico-form');
        $form->setInputFilter($inputFilter);

        return new ServicoController($servicoService, $form);
    }
}