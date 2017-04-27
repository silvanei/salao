<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 27/04/2017
 * Time: 09:09
 */

namespace Common\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\Plugin\FlashMessenger\FlashMessenger;

/**
 * Class AbstractController
 * @package Common\Controller
 *
 * @method FlashMessenger flashMessenger()
 */
abstract class AbstractController extends AbstractActionController
{

}