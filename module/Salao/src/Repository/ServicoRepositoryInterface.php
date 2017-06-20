<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 08/06/2017
 * Time: 10:01
 */

namespace Salao\Repository;

use Salao\Entity\Servico;

interface ServicoRepositoryInterface
{

    public function findBySaloonId(int $saloonId, string $serarch): array;

    public function create(Servico $servico, int $saloonId): Servico;

    public function getBy(int $id): Servico;

    public function update(Servico $servico): Servico;
}