<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 22/04/17
 * Time: 20:58
 */

namespace Profissional\Repository;

use Profissional\Entity\AcessoProfissional;

interface AcessoRepositoryInterface
{

    public function add(AcessoProfissional $acesso): AcessoProfissional;
}