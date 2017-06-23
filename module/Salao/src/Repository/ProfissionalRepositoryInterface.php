<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 22/04/17
 * Time: 20:58
 */

namespace Salao\Repository;

use Profissional\Entity\Profissional;

interface ProfissionalRepositoryInterface
{

    public function add(Profissional $profissional): Profissional;
}