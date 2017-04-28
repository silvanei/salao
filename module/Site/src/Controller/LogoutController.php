<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 17/04/17
 * Time: 21:38
 */

namespace Site\Controller;

use Common\Controller\AbstractController;
use Zend\Authentication\AuthenticationServiceInterface;

/**
 * Class LoginController
 * @package Site\Controller
 */
class LogoutController extends AbstractController
{

    const ROUTE_NAME = 'site-logout';

    /**
     * @var AuthenticationServiceInterface
     */
    private $authenticationService;

    /**
     * LogoutController constructor.
     * @param AuthenticationServiceInterface $authenticationService
     */
    public function __construct(AuthenticationServiceInterface $authenticationService)
    {
        $this->authenticationService = $authenticationService;
    }

    public function indexAction()
    {

        $this->authenticationService->clearIdentity();

        $this->flashMessenger()->addSuccessMessage('Logout realizado com sucesso.');
        return $this->redirect()->toRoute(LoginController::ROUTE_NAME);

    }
}