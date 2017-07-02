<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 27/04/17
 * Time: 21:33
 */

namespace Profissional\Controller;

use Common\Controller\AbstractController;
use Profissional\Entity\Profissional;
use Profissional\Service\ProfissionalService;
use Profissional\Form\ProfissionalForm;
use Zend\View\Model\ViewModel;

/**
 * Class ProfissionalController
 * @package Profissional\Controller
 */
class ProfissionalController extends AbstractController
{

    const ROUTE_NAME = 'profissional-profissional';
    const ITEM_COUNT_PER_PAGE = 25;

    /** @var  ProfissionalService */
    protected $profissionalService;

    /** @var  ProfissionalForm */
    protected $profissionalForm;

    /**
     * ProfissionalController constructor.
     * @param ProfissionalService $profissionalService
     * @param ProfissionalForm $profissionalForm
     */
    public function __construct(ProfissionalService $profissionalService, ProfissionalForm $profissionalForm)
    {
        $this->profissionalService = $profissionalService;
        $this->profissionalForm = $profissionalForm;
    }


    public function indexAction()
    {

        $serarch = $this->params()->fromQuery('search', '');
        $pagina = $this->params()->fromQuery('page', 1);

        $profissionais = $this->profissionalService->findAll($serarch);
        $profissionais
            ->setCurrentPageNumber($pagina)
            ->setItemCountPerPage(self::ITEM_COUNT_PER_PAGE)
        ;

        return new ViewModel(['profissionais' => $profissionais, 'serarch' => $serarch, 'query' => $this->params()->fromQuery()]);
    }

    public function criarAction()
    {

        $request   = $this->getRequest();
        $viewModel = new ViewModel(['form' => $this->profissionalForm]);

        if (! $request->isPost()) {
            return $viewModel;
        }

        $this->profissionalForm->setData($request->getPost());

        if (! $this->profissionalForm->isValid()) {
            return $viewModel;
        }

        $data = $this->profissionalForm->getData();

        try {
            $profissional = new Profissional();
            $profissional->setNome($data[ProfissionalForm::NOME]);
            $profissional->setApelido($data[ProfissionalForm::APELIDO]);
            $profissional->setTelefone($data[ProfissionalForm::TELEFONE]);
            $profissional->setCelular($data[ProfissionalForm::CELULAR]);

            $this->profissionalService->create($profissional);
        } catch (\Throwable $exception) {
            $this->profissionalForm->setMessages(['exception' => $exception->getMessage()]);
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

            $profissional = $this->profissionalService->getBy($id);

        } catch (\InvalidArgumentException $exception) {

            $this->flashMessenger()->addInfoMessage('Profissional não encontrado.');
            return $this->redirect()->toRoute(self::ROUTE_NAME);

        }

        $this->profissionalForm->bind($profissional);
        $viewModel = new ViewModel(['form' => $this->profissionalForm]);

        $request = $this->getRequest();
        if (! $request->isPost()) {
            return $viewModel;
        }

        $this->profissionalForm->setData($request->getPost());

        if (! $this->profissionalForm->isValid()) {
            return $viewModel;
        }


        $this->profissionalService->update($profissional);

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

            $profissional = $this->profissionalService->getBy($id);

        } catch (\InvalidArgumentException $exception) {

            $this->flashMessenger()->addInfoMessage('Profissional não encontrado.');
            return $this->redirect()->toRoute(self::ROUTE_NAME);

        }

        $this->profissionalForm->bind($profissional);
        $viewModel = new ViewModel(['form' => $this->profissionalForm]);

        $request = $this->getRequest();
        if (! $request->isPost()) {
            return $viewModel;
        }

        $this->profissionalService->delete($profissional);

        $this->flashMessenger()->addSuccessMessage('Profissional excluido com sucesso.');
        return $this->redirect()->toRoute(self::ROUTE_NAME);
    }
}