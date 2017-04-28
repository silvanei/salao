<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 27/04/17
 * Time: 20:56
 */

namespace Salao\Controller;

use Common\Controller\AbstractController;
use Zend\View\Model\ViewModel;

/**
 * Class SalaoController
 * @package Salao\Controller
 */
class CadastroController extends AbstractController
{

    const ROUTE_NAME = 'salao-cadastro';

    public function indexAction()
    {

        return new ViewModel();
    }
}