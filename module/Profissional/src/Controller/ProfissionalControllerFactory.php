<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 23/06/2017
 * Time: 12:45
 */

namespace Profissional\Controller;

use Interop\Container\ContainerInterface;
use Profissional\Form\ProfissionalInputFilter;
use Profissional\Service\ProfissionalService;
use Profissional\Form\ProfissionalForm;
use Zend\ServiceManager\Factory\FactoryInterface;

final class ProfissionalControllerFactory implements FactoryInterface
{


    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): ProfissionalController
    {

        $profissionalService = $container->get(ProfissionalService::class);
        $inputFilter = new ProfissionalInputFilter();
        $form = new ProfissionalForm('profissional-form');
        $form->setInputFilter($inputFilter);

        return new ProfissionalController($profissionalService, $form);
    }
}