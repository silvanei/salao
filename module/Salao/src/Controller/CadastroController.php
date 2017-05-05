<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 27/04/17
 * Time: 20:56
 */

namespace Salao\Controller;

use Common\Controller\AbstractController;
use Salao\Entity\Identity;
use Salao\Service\SalaoService;
use Zend\Authentication\AuthenticationServiceInterface;
use Zend\Form\FormInterface;
use Zend\Hydrator\ClassMethods;
use Zend\View\Model\ViewModel;

/**
 * Class SalaoController
 * @package Salao\Controller
 */
class CadastroController extends AbstractController
{

    const ROUTE_NAME = 'salao-cadastro';

    /** @var  SalaoService */
    protected $salaoService;

    /**
     * @var FormInterface
     */
    protected $salaoForm;

    /** @var  Identity */
    protected $identity;

    /**
     * CadastroController constructor.
     * @param SalaoService $salaoService
     * @param FormInterface $salaoForm
     * @param AuthenticationServiceInterface $authenticationService
     */
    public function __construct(
        SalaoService $salaoService,
        FormInterface $salaoForm,
        AuthenticationServiceInterface $authenticationService
    ) {
        $this->salaoService = $salaoService;
        $this->salaoForm = $salaoForm;
        $this->identity = $authenticationService->getIdentity();
    }

    public function indexAction()
    {

        $request = $this->getRequest();
        $viewParans = ['form' => $this->salaoForm];

        if ($request->isGet()) {

            $salao = $this->salaoService->byId($this->identity->getSalaoId());
            $this->salaoForm->setHydrator(new ClassMethods());
            $this->salaoForm->bind($salao);

            return new ViewModel($viewParans);
        }

        $this->salaoForm->setData($request->getPost());
        if (!$this->salaoForm->isValid()) {
            return new ViewModel($viewParans);
        }

        return new ViewModel($viewParans);
    }
}