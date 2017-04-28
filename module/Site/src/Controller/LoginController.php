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
use Zend\View\Model\ViewModel;
use Salao\Controller\CadastroController;

/**
 * Class LoginController
 * @package Site\Controller
 */
class LoginController extends AbstractController
{

    const ROUTE_NAME = 'site-login';
    /** @var  LoginForm */
    private $loginForm;

    /**
     * LoginController constructor.
     * @param LoginForm $loginForm
     */
    public function __construct( LoginForm $loginForm) {
        $this->loginForm = $loginForm;
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

        $this->flashMessenger()->addSuccessMessage('Authenticado com sucesso.');
        return $this->redirect()->toRoute(CadastroController::ROUTE_NAME);

    }
}