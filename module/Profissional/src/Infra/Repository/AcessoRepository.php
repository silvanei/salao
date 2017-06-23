<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 22/04/17
 * Time: 20:58
 */

namespace Profissional\Infra\Repository;

use Doctrine\ORM\EntityRepository;
use Profissional\Entity\AcessoProfissional;
use Profissional\Repository\AcessoRepositoryInterface;

class AcessoRepository extends EntityRepository implements AcessoRepositoryInterface
{

    public function add(AcessoProfissional $acesso): AcessoProfissional
    {

        $this->getEntityManager()->persist($acesso);
        $this->getEntityManager()->flush();
        return $acesso;
    }


}