<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 22/04/17
 * Time: 20:58
 */

namespace Salao\Infra\Repository;

use Doctrine\ORM\EntityRepository;
use Salao\Entity\Acesso;
use Salao\Repository\AcessoRepositoryInterface;

class AcessoRepository extends EntityRepository implements AcessoRepositoryInterface
{

    public function add(Acesso $acesso): Acesso
    {

        $this->getEntityManager()->persist($acesso);
        $this->getEntityManager()->flush();
        return $acesso;
    }


}