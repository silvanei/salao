<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 27/04/17
 * Time: 21:33
 */

namespace Cliente\Controller;

use Common\Controller\AbstractController;
use Zend\View\Model\ViewModel;

/**
 * Class ClienteController
 * @package Cliente\Controller
 */
class ClienteController extends AbstractController
{

    const ROUTE_NAME = 'cliente-cliente';

    public function indexAction()
    {
        return new ViewModel();
    }
}