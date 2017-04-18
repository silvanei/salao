<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 18/04/2017
 * Time: 09:19
 */

namespace Acesso\Model;


use Zend\Form\Element;
use Zend\Form\Form;

class LoginForm extends Form
{
    public function __construct(string $name = null)
    {
        parent::__construct($name);

        $email = new Element('email');
        $email->setAttributes([
            'id' => 'email',
            'type' => 'text',
            'placeholder' => 'E-mail',
            'class' => 'form-control'
        ]);
        $this->add($email);

        $password = new Element\Password('password');
        $password->setAttributes([
            'id' => 'password',
            'placeholder' => 'Password',
            'required' => 'required',
            'minlength' => '5',
            'maxlength' => '10',
            'class' => 'form-control'
        ]);
        $this->add($password);
    }


}