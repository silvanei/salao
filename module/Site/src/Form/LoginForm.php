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

/**
 * Class LoginForm
 * @package Site\Form
 */
class LoginForm extends Form
{

    const EMAIL = 'email';
    const PASSWORD = 'password';

    /**
     * LoginForm constructor.
     * @param string|null $name
     */
    public function __construct(string $name = null)
    {
        parent::__construct($name);

        $email = new Text(self::EMAIL);
        $email->setAttributes([
            'id' => 'email',
            'placeholder' => 'E-mail',
            'required' => 'required'
        ]);
        $this->add($email);

        $password = new Password(self::PASSWORD);
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