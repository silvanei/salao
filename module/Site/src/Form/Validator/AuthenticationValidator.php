<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 27/04/2017
 * Time: 16:01
 */

namespace Site\Form\Validator;


use Zend\Authentication\Adapter\AbstractAdapter;
use Zend\Authentication\AuthenticationServiceInterface;
use Zend\Validator\AbstractValidator;

class AuthenticationValidator extends AbstractValidator
{

    /** @var  AuthenticationServiceInterface */
    private $authenticationService;

    /** @var  AbstractAdapter */
    private $authenticationAdapter;

    const AUTH_INVALID = 'auth_invalid';

    protected $messageTemplates = array(
        self::AUTH_INVALID => "E-mail ou senha inválido"
    );

    public function __construct(
        AuthenticationServiceInterface $authenticationService,
        AbstractAdapter $authenticationAdapter,
        $options = null
    ) {
        parent::__construct($options);

        $this->authenticationAdapter = $authenticationAdapter;
        $this->authenticationService = $authenticationService;
    }

    public function isValid($value, $context = null)
    {
        $this->setValue($value);

        $this->authenticationAdapter->setIdentity($context['email']);
        $this->authenticationAdapter->setCredential($context['password']);

        $result = $this->authenticationService->authenticate($this->authenticationAdapter);

        if ($result->isValid()) {
            return true;
        }

        $this->error(self::AUTH_INVALID);
        return false;
    }
}