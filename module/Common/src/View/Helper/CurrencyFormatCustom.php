<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 09/06/2017
 * Time: 09:57
 */

namespace Common\View\Helper;

use Zend\I18n\View\Helper\CurrencyFormat;

class CurrencyFormatCustom extends CurrencyFormat
{
    protected $currencyCode = 'BRL';
    protected $locale = 'pt_BR';
    protected $currencyPattern = 'R$ #,##0.###';
}