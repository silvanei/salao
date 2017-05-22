<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 17/04/17
 * Time: 22:14
 */

namespace Site\Controller;

use Common\Controller\AbstractController;
use Salao\Entity\AcessoProfissional;
use Salao\Entity\Profissional;
use Salao\Entity\Salao;
use Security\Authorization\Role;
use Site\Service\CadastroService;
use Zend\Form\FormInterface;
use Zend\View\Model\ViewModel;

class CadastroController extends AbstractController
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

        $acessoProfissional = new AcessoProfissional();
        $acessoProfissional->setEmail($data['emailAdministradorSalao']);
        $acessoProfissional->setSenha($data['senhaAdministradorSalao']);
        $acessoProfissional->setProfissional($profissional);
        $acessoProfissional->setPerfil(Role::SALAO_ADMIN);

        $this->cadastroService->cadastrarSalao($salao, $acessoProfissional);

        $this->flashMessenger()->addSuccessMessage('Salão cadastrado com sucesso.');

        return $this->redirect()->toRoute('site-login');
    }
}