<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 27/04/17
 * Time: 20:56
 */

namespace Salao\Controller;

use Common\Controller\AbstractController;
use Salao\Entity\HorarioFuncionamento;
use Salao\Entity\Identity;
use Salao\Entity\Salao;
use Salao\Form\SalaoForm;
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
            var_dump($salao);
            return new ViewModel($viewParans);
        }

        $this->salaoForm->setData($request->getPost());
        if ($this->salaoForm->isValid()) {

            $data = $this->salaoForm->getData();

            $salao = $this->salaoService->byId($this->identity->getSalaoId());

            $horario = $salao->getHorario();
            foreach ($data[SalaoForm::DIAS_FUNCIONAMENTO] as $dia) {
                switch ($dia) {
                    case '0': $horario->setDomingo(true); break;
                    case '1': $horario->setSegunda(true); break;
                    case '2': $horario->setTerca(true); break;
                    case '3': $horario->setQuarta(true); break;
                    case '4': $horario->setQuinta(true); break;
                    case '5': $horario->setSexta(true); break;
                    case '6': $horario->setSabado(true); break;
                }
            }

            $salao->setNome($data[SalaoForm::NOME]);
            $salao->setVisivelNoApp($data[SalaoForm::VISIVAL_NO_APP]);
            $salao->setTelefone($data[SalaoForm::TELEFONE]);
            $salao->setCelular($data[SalaoForm::CELULAR]);
            $salao->setHorario($horario);

            $this->salaoService->update($salao);

            return $this->redirect()->toRoute(self::ROUTE_NAME);
        }

        return new ViewModel($viewParans);
    }
}