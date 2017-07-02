<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 22/04/17
 * Time: 20:58
 */

namespace Profissional\Infra\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator as ORMPaginator;
use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator as DoctrineAdapter;
use Profissional\Entity\Profissional;
use Profissional\Repository\ProfissionalRepositoryInterface;
use Salao\Entity\Salao;
use Zend\I18n\Filter\Alnum;
use Zend\Paginator\Paginator;

class ProfissionalRepository extends EntityRepository implements ProfissionalRepositoryInterface
{

    public function add(Profissional $profissional): Profissional
    {
        $this->getEntityManager()->persist($profissional);
        $this->getEntityManager()->flush();

        return $profissional;
    }

    public function findBySaloonId(int $saloonId, string $serarch): Paginator
    {
        $filter = new Alnum();

        $query = $this->createQueryBuilder('p');
        $query->where(
            $query->expr()->andX(
                $query->expr()->eq('p.salao', $saloonId),
                $query->expr()->eq('p.deletado', 0),
                $query->expr()->orX(
                    $query->expr()->like('p.nome', sprintf("'%%%s%%'", $serarch)),
                    $query->expr()->like('p.apelido', sprintf("'%%%s%%'", $serarch)),
                    $query->expr()->like('p.telefone', sprintf("'%%%s%%'", $filter->filter($serarch))),
                    $query->expr()->like('p.celular', sprintf("'%%%s%%'", $filter->filter($serarch)))
                )
            )
        );

        $adapter = new DoctrineAdapter(new ORMPaginator($query, false));

        return new Paginator($adapter);
    }

    public function criar(Profissional $profissional, int $saloonId): Profissional
    {
        $saloon = $this->getEntityManager()->find(Salao::class, $saloonId);
        $profissional->setSalao($saloon);

        $this->getEntityManager()->persist($profissional);
        $this->getEntityManager()->flush();

        return $profissional;
    }

    public function getBy(int $id, int $saloonId): Profissional
    {
        /** @var Profissional $profissional */
        $profissional = $this->findOneBy([
            'id' => $id,
            'salao' => $saloonId,
            'deletado' => 0
        ]);
        if (is_null($profissional)) {
            throw new \InvalidArgumentException(sprintf('Profissional by id "%s" not found', $id));
        }

        return $profissional;
    }

    public function update(Profissional $profissional): Profissional
    {

        $this->getEntityManager()->persist($profissional);
        $this->getEntityManager()->flush();
        return $profissional;
    }


}