<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 27/04/17
 * Time: 20:56
 */

namespace Salao\Controller;

use Common\Controller\AbstractController;
use Salao\Entity\Servico;
use Salao\Form\ServicoForm;
use Salao\Service\ServicoService;
use Zend\Form\Form;
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

        $serarch = $this->params()->fromQuery('search', '');

        $servicos = $this->servicoService->findAll($serarch);

        return new ViewModel(['servicos' => $servicos, 'serarch' => $serarch]);
    }

    public function criarAction()
    {

        $request   = $this->getRequest();
        $viewModel = new ViewModel(['form' => $this->form]);

        if (! $request->isPost()) {
            return $viewModel;
        }

        $this->form->setData($request->getPost());

        if (! $this->form->isValid()) {
            return $viewModel;
        }

        $data = $this->form->getData();

        try {

            $servico = new Servico();
            $servico->setDescricao($data[ServicoForm::DESCRICAO]);
            $servico->setDuracao($data[ServicoForm::DURACAO]);
            $servico->setValor($data[ServicoForm::VALOR]);

            $this->servicoService->create($servico);
        } catch (\Throwable $exception) {
            $this->form->setMessages(['exception' => $exception->getMessage()]);
            return $viewModel;
        }

        $this->flashMessenger()->addSuccessMessage('Serviço cadastrado com sucesso.');
        return $this->redirect()->toRoute(self::ROUTE_NAME);

    }

    public function editarAction()
    {

        $id = (int)$this->params()->fromRoute('id');
        if (! $id) {
            return $this->redirect()->toRoute(self::ROUTE_NAME);
        }

        try {

            $servico = $this->servicoService->getBy($id);

        } catch (\InvalidArgumentException $exception) {

            $this->flashMessenger()->addInfoMessage('Serviço não encontrado.');
            return $this->redirect()->toRoute(self::ROUTE_NAME);

        }

        $this->form->bind($servico);
        $viewModel = new ViewModel(['form' => $this->form]);

        $request = $this->getRequest();
        if (! $request->isPost()) {
            return $viewModel;
        }

        $this->form->setData($request->getPost());

        if (! $this->form->isValid()) {
            return $viewModel;
        }


        $this->servicoService->update($servico);

        $this->flashMessenger()->addSuccessMessage('Serviço atualizado com sucesso.');
        return $this->redirect()->toRoute(self::ROUTE_NAME);
    }

    public function excluirAction()
    {

        $id = (int)$this->params()->fromRoute('id');
        if (! $id) {
            return $this->redirect()->toRoute(self::ROUTE_NAME);
        }

        try {

            $servico = $this->servicoService->getBy($id);

        } catch (\InvalidArgumentException $exception) {

            $this->flashMessenger()->addInfoMessage('Serviço não encontrado.');
            return $this->redirect()->toRoute(self::ROUTE_NAME);

        }

        $this->form->bind($servico);
        $viewModel = new ViewModel(['form' => $this->form]);

        $request = $this->getRequest();
        if (! $request->isPost()) {
            return $viewModel;
        }

        $this->servicoService->delete($servico);

        $this->flashMessenger()->addSuccessMessage('Serviço excluido com sucesso.');
        return $this->redirect()->toRoute(self::ROUTE_NAME);
    }
}