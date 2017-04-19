<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 17/04/17
 * Time: 21:38
 */

namespace Acesso\Controller;

use Acesso\Form\LoginForm;
use Acesso\Form\LoginInputFilter;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ModelInterface;
use Zend\View\Model\ViewModel;

class LoginController extends AbstractActionController
{
    public function indexAction(): ModelInterface
    {

        $validator = new LoginInputFilter();
        $form = new LoginForm('loginForm');
        $form->setInputFilter($validator);

        $form->setData([
            'email' => '',
            'password' => '1',
        ]);
        $form->isValid();
        return new ViewModel(['form' => $form]);
    }
}