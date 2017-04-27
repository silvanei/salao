<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 18/04/17
 * Time: 21:10
 */

namespace Site\Form;

use Interop\Container\ContainerInterface;
use Zend\Form\FormInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class LoginFormFactory
 * @package Site\Form
 */
final class LoginFormFactory implements FactoryInterface
{

    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return FormInterface
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) : FormInterface
    {

        $validator = new LoginInputFilter();
        $form = new LoginForm('loginForm');
        $form->setInputFilter($validator);

        return $form;
    }
}