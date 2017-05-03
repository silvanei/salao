<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 18/04/17
 * Time: 21:10
 */

namespace Salao\Form;

use Interop\Container\ContainerInterface;
use Zend\Form\FormInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class SalaoFormFactory
 * @package Site\Form
 */
final class SalaoFormFactory implements FactoryInterface
{

    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return FormInterface
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) : FormInterface
    {

        $form = new SalaoForm('salaoForm');
        $form->setInputFilter(new SalaoInputFilter());

        return $form;
    }
}