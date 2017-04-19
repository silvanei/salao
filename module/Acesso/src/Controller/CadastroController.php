<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 17/04/17
 * Time: 22:14
 */

namespace Acesso\Controller;

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
     * CadastroController constructor.
     * @param FormInterface $cadastroForm
     */
    public function __construct(FormInterface $cadastroForm)
    {
        $this->cadastroForm = $cadastroForm;
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