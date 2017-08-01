<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 30/07/17
 * Time: 12:46
 */

namespace Profissional\Controller;

use Common\Controller\AbstractController;
use Profissional\Service\ProfissionalService;
use Zend\View\Model\ViewModel;

/**
 * Class ProfissionalServicoController
 * @package Profissional\Controller
 */
class ProfissionalServicoController extends AbstractController
{

    const ROUTE_NAME = 'profissional-servico';

    /** @var  ProfissionalService */
    protected $profissionalService;

    /**
     * ProfissionalServicoController constructor.
     * @param ProfissionalService $profissionalService
     */
    public function __construct(ProfissionalService $profissionalService)
    {
        $this->profissionalService = $profissionalService;
    }


    public function indexAction()
    {

        $profissionalId = (int)$this->params()->fromRoute('profissional', 0);

        try {

            $profissional = $this->profissionalService->getBy($profissionalId);
        } catch (\InvalidArgumentException $exception) {

            $this->flashMessenger()->addInfoMessage('Profissional não encontrado.');
            return $this->redirect()->toRoute(ProfissionalController::ROUTE_NAME);

        }

        return new ViewModel([
            'servicosNaoPrestado' => $this->profissionalService->servicesNotProvided($profissionalId),
            'servicosPrestado' => $profissional->getServico()
        ]);
    }
}