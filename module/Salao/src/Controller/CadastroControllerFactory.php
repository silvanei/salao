<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 18/04/17
 * Time: 21:20
 */

namespace Salao\Controller;

use Interop\Container\ContainerInterface;
use Salao\Form\SalaoForm;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\ServiceManager\Factory\FactoryInterface;

class CadastroControllerFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): AbstractActionController
    {
        $form = $container->get(SalaoForm::class);

        return new CadastroController($form);
    }
}