<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 18/04/2017
 * Time: 09:19
 */

namespace Site\Form;

use Zend\Form\Element\Password;
use Zend\Form\Element\Text;
use Zend\Form\Form;

class LoginForm extends Form
{
    public function __construct(string $name = null)
    {
        parent::__construct($name);

        $email = new Text('email');
        $email->setAttributes([
            'id' => 'email',
            'placeholder' => 'E-mail',
            'required' => 'required'
        ]);
        $this->add($email);

        $password = new Password('password');
        $password->setAttributes([
            'id' => 'password',
            'placeholder' => 'Password',
            'required' => 'required',
            'minlength' => '5',
            'maxlength' => '10'
        ]);
        $this->add($password);
    }


}