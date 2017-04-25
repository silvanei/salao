<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 22/04/17
 * Time: 20:58
 */

namespace Salao\Repository;

use Salao\Entity\Acesso;

interface AcessoRepositoryInterface
{

    public function add(Acesso $acesso): Acesso;
}