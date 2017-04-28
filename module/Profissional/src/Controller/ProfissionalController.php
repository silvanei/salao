<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 27/04/17
 * Time: 21:33
 */

namespace Profissional\Controller;

use Common\Controller\AbstractController;
use Zend\View\Model\ViewModel;

/**
 * Class ProfissionalController
 * @package Profissional\Controller
 */
class ProfissionalController extends AbstractController
{

    const ROUTE_NAME = 'profissional-profissional';

    public function indexAction()
    {
        return new ViewModel();
    }
}