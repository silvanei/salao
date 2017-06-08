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

    /**
     * ServicoController constructor.
     * @param ServicoService $servicoService
     */
    public function __construct(ServicoService $servicoService)
    {
        $this->servicoService = $servicoService;
    }


    public function indexAction()
    {

        $this->servicoService->findAll();

        return new ViewModel();
    }
}