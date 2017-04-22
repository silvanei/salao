<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 18/04/2017
 * Time: 15:53
 */

namespace Common\View\Helper;


use Zend\Form\View\Helper\FormElementErrors;

class FormElementErrorsCustom extends FormElementErrors
{
    protected $messageCloseString     = '</div>';
    protected $messageOpenFormat      = '<div%s class="help-block">';
    protected $messageSeparatorString = '</div><div class="help-block">';
}