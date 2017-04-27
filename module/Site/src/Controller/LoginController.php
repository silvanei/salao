<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 17/04/17
 * Time: 21:38
 */

namespace Site\Controller;

use Site\Form\LoginForm;
use Site\Form\LoginInputFilter;
use Zend\Authentication\Adapter\AbstractAdapter;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\AuthenticationServiceInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ModelInterface;
use Zend\View\Model\ViewModel;

class LoginController extends AbstractActionController
{

    /** @var  LoginForm */
    private $loginForm;

    /** @var  AbstractAdapter */
    private $authenticationService;

    /**
     * LoginController constructor.
     * @param LoginForm $loginForm
     * @param AbstractAdapter $authenticationService
     */
    public function __construct(LoginForm $loginForm, AbstractAdapter $authenticationService)
    {
        $this->loginForm = $loginForm;
        $this->authenticationService = $authenticationService;
    }


    public function indexAction()
    {
        $request = $this->getRequest();
        $viewParans = ['form' => $this->loginForm];

        if ($request->isGet()) {
            return new ViewModel($viewParans);
        }

        $this->loginForm->setData($request->getPost());
        if (!$this->loginForm->isValid()) {
            return new ViewModel($viewParans);
        }

        $data = $this->loginForm->getData();

        $this->authenticationService->setIdentity($data['email']);
        $this->authenticationService->setCredential($data['password']);

        $auth = new AuthenticationService();

        $result = $auth->authenticate($this->authenticationService);

        if ($result->isValid()) {
            $this->flashMessenger()->addSuccessMessage('Authenticado com sucesso.');
        } else {
            $this->flashMessenger()->addErrorMessage('Usuário ou senha inválido.');
        }

        return $this->redirect()->toRoute('site-login');

    }
}