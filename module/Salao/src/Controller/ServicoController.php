<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 27/04/17
 * Time: 20:56
 */

namespace Salao\Controller;

use Common\Controller\AbstractController;
use Salao\Service\ServicoService;
use Zend\Form\Form;
use Zend\Http\Request;
use Zend\View\Model\ViewModel;

/**
 * Class SalaoController
 * @package Salao\Controller
 */
class ServicoController extends AbstractController
{

    const ROUTE_NAME = 'salao-servico';

    /** @var  ServicoService */
    protected $servicoService;

    /** @var  Form */
    protected $form;

    /**
     * ServicoController constructor.
     * @param ServicoService $servicoService
     * @param Form $form
     */
    public function __construct(ServicoService $servicoService, Form $form)
    {
        $this->servicoService = $servicoService;
        $this->form = $form;
    }


    public function indexAction()
    {

        $servicos = $this->servicoService->findAll();

        return new ViewModel(['servicos' => $servicos]);
    }

    public function criarAction()
    {

        /** @var Request $request */
        $request = $this->getRequest();

        $viewParans = ['form' => $this->form];

        if ($request->isGet()) {
            return new ViewModel($viewParans);
        }

        $this->form->setData($request->getPost()->toArray());
        if ($this->form->isValid()) {
            
        }
        return new ViewModel($viewParans);
    }

    public function editarAction()
    {

        $servicos = $this->servicoService->findAll();

        return new ViewModel(['servicos' => $servicos]);
    }
}