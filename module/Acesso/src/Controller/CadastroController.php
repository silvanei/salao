<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 17/04/17
 * Time: 22:14
 */

namespace Acesso\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ModelInterface;
use Zend\View\Model\ViewModel;

class CadastroController extends AbstractActionController
{
    public function indexAction(): ModelInterface
    {
        return new ViewModel();
    }
}