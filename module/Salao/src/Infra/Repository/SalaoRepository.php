<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 22/04/17
 * Time: 20:58
 */

namespace Salao\Infra\Repository;

use Doctrine\ORM\EntityRepository;
use Salao\Entity\Salao;
use Salao\Repository\SalaoRepositoryInterface;

class SalaoRepository extends EntityRepository  implements SalaoRepositoryInterface
{

    public function add(Salao $salao): Salao
    {
        $this->getEntityManager()->persist($salao);
        $this->getEntityManager()->flush();

        return $salao;
    }

    public function update(Salao $salao)
    {
        $this->getEntityManager()->persist($salao);
        $this->getEntityManager()->flush();

        return $salao;
    }
}