<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 27/04/17
 * Time: 20:56
 */

namespace Salao\Controller;

use Common\Controller\AbstractController;
use Salao\Entity\Identity;
use Salao\Form\SalaoForm;
use Salao\Service\SalaoService;
use Zend\Authentication\AuthenticationServiceInterface;
use Zend\Form\FormInterface;
use Zend\Http\Request;
use Zend\Hydrator\ClassMethods;
use Zend\View\Model\ViewModel;

/**
 * Class SalaoController
 * @package Salao\Controller
 */
class ServicoController extends AbstractController
{

    const ROUTE_NAME = 'salao-servico';

    public function indexAction()
    {

        return new ViewModel();
    }
}