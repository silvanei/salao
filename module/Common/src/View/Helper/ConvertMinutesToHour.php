<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 25/04/2017
 * Time: 15:32
 */

namespace Common\View\Helper;

use Zend\View\Helper\AbstractHelper;

class ConvertMinutesToHour extends AbstractHelper
{

    public function __invoke(int $minutes): string
    {

        if ($minutes < 0) {
            throw new \InvalidArgumentException('Não é permitido valor negativo.');
        }

        if ($minutes >= 1440) {
            throw new \InvalidArgumentException('Não é permitido valor maior que 1440 minutos (1 Dia).');
        }
        
        $seconds = $minutes * 60;
        return gmdate('H:i', $seconds);
    }
}