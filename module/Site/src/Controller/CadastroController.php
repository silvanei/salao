<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 17/04/17
 * Time: 22:14
 */

namespace Site\Controller;

use Salao\Entity\Acesso;
use Salao\Entity\Profissional;
use Salao\Entity\Salao;
use Site\Service\CadastroService;
use Zend\Form\FormInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class CadastroController extends AbstractActionController
{

    /**
     * @var FormInterface
     */
    protected $cadastroForm;

    /**
     * @var CadastroService
     */
    protected $cadastroService;

    /**
     * CadastroController constructor.
     * @param CadastroService $service
     * @param FormInterface $form
     */
    public function __construct(
        CadastroService $service,
        FormInterface $form
    ) {
        $this->cadastroService = $service;
        $this->cadastroForm = $form;
    }


    public function indexAction()
    {
        $request = $this->getRequest();
        $viewParans = ['form' => $this->cadastroForm];

        if (!$request->isPost()) {
            return new ViewModel($viewParans);
        }

        $this->cadastroForm->setData($request->getPost());
        if (!$this->cadastroForm->isValid()) {
            return new ViewModel($viewParans);
        }

        $data = $this->cadastroForm->getData();
        $salao = new Salao();
        $salao->setNome($data['nomeSalao']);
        $salao->setTelefone($data['telefoneSalao']);

        $profissional = new Profissional();
        $profissional->setNome($data['nomeAdministradorSalao']);

        $acesso = new Acesso();
        $acesso->setEmail($data['emailAdministradorSalao']);
        $acesso->setSenha($data['senhaAdministradorSalao']);
        $acesso->setPerfil('SALAO_ADMIN');

        $this->cadastroService->cadastrarSalao($salao, $acesso, $profissional);

        $this->flashMessenger()->addSuccessMessage('Salão cadastrado com sucesso.');

        return $this->redirect()->toRoute('site-login');
    }
}