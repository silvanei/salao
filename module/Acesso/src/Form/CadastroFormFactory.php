<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 18/04/17
 * Time: 21:10
 */

namespace Acesso\Form;


use Interop\Container\ContainerInterface;
use Zend\Form\FormInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class CadastroFormFactory implements FactoryInterface
{


    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) : FormInterface
    {

        $form = new CadastroForm('registroForm');
        $form->setInputFilter(new CadastroInputFilter());

        return $form;
    }
}