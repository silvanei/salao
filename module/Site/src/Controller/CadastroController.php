<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 17/04/17
 * Time: 22:14
 */

namespace Site\Controller;

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

        // @todo salvar no DB

        return $this->redirect()->toRoute('acesso-login');
    }
}