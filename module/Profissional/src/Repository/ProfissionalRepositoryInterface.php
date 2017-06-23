<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 22/04/17
 * Time: 20:58
 */

namespace Profissional\Repository;

use Profissional\Entity\Profissional;
use Zend\Paginator\Paginator;

interface ProfissionalRepositoryInterface
{

    public function add(Profissional $profissional): Profissional;

    public function findBySaloonId(int $saloonId, string $serarch): Paginator;

    public function criar(Profissional $profissional, int $saloonId): Profissional;

    public function update(Profissional $profissional): Profissional;

    public function getBy(int $id, int $saloonId): Profissional;
}