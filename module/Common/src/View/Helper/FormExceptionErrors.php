<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 18/04/2017
 * Time: 15:53
 */

namespace Common\View\Helper;


use Zend\Form\Form;
use Zend\View\Helper\AbstractHelper;

class FormExceptionErrors extends AbstractHelper
{

    private $template =
        '<div class="box-body">
                <div class="callout callout-danger">
                    <p>%s</p>
                </div>
        </div>';

    function __invoke(Form $form)
    {

        if (!empty($form->getMessages()['exception'])) {

            return sprintf($this->template, $form->getMessages()['exception']);
        }

        return '';
    }


}