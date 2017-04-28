<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 27/04/17
 * Time: 21:33
 */

namespace Agenda\Controller;

use Common\Controller\AbstractController;
use Zend\View\Model\ViewModel;

/**
 * Class AgendaController
 * @package Agenda\Controller
 */
class AgendaController extends AbstractController
{

    const ROUTE_NAME = 'agenda-agenda';

    public function indexAction()
    {
        return new ViewModel();
    }
}