<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 17/04/17
 * Time: 21:38
 */

namespace Site\Controller;

use Common\Controller\AbstractController;
use Site\Form\LoginForm;
use Zend\Authentication\Adapter\AbstractAdapter;
use Zend\Authentication\AuthenticationServiceInterface;
use Zend\View\Model\ViewModel;

/**
 * Class LoginController
 * @package Site\Controller
 */
class LoginController extends AbstractController
{

    /** @var  LoginForm */
    private $loginForm;

    /** @var  AuthenticationServiceInterface */
    private $authenticationService;

    /** @var  AbstractAdapter */
    private $authenticationAdapter;

    /**
     * LoginController constructor.
     * @param LoginForm $loginForm
     * @param AuthenticationServiceInterface $authenticationService
     * @param AbstractAdapter $authenticationAdapter
     */
    public function __construct(
        LoginForm $loginForm,
        AuthenticationServiceInterface $authenticationService,
        AbstractAdapter $authenticationAdapter
    ) {
        $this->loginForm = $loginForm;
        $this->authenticationService = $authenticationService;
        $this->authenticationAdapter = $authenticationAdapter;
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

        $this->authenticationAdapter->setIdentity($data['email']);
        $this->authenticationAdapter->setCredential($data['password']);

        $result = $this->authenticationService->authenticate($this->authenticationAdapter);

        if (!$result->isValid()) {
            $this->flashMessenger()->addErrorMessage('Usuário ou senha inválido.');
            return $this->redirect()->toRoute('site-login');
        }

        $this->flashMessenger()->addSuccessMessage('Authenticado com sucesso.');
        return $this->redirect()->toRoute('site-cadastro');

    }
}