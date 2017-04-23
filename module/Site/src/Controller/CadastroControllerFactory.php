<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 18/04/17
 * Time: 21:20
 */

namespace Site\Controller;

use Interop\Container\ContainerInterface;
use Site\Service\CadastroService;
use Site\Form\CadastroForm;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\ServiceManager\Factory\FactoryInterface;

class CadastroControllerFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): AbstractActionController
    {

        $service = $container->get(CadastroService::class);
        $form = $container->get(CadastroForm::class);

        return new CadastroController($service, $form);
    }
}