<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 08/06/2017
 * Time: 10:03
 */

namespace Salao\Infra\Repository;

use Doctrine\ORM\EntityRepository;
use Salao\Entity\Salao;
use Salao\Entity\Servico;
use Salao\Repository\ServicoRepositoryInterface;

use Zend\Paginator\Paginator;
use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator as DoctrineAdapter;
use Doctrine\ORM\Tools\Pagination\Paginator as ORMPaginator;


class ServicoRepository extends EntityRepository implements ServicoRepositoryInterface
{

    public function findBySaloonId(int $saloonId, string $serarch): Paginator
    {
        $query = $this->createQueryBuilder('s');
        $query->where(
            $query->expr()->andX(
                $query->expr()->eq('s.salao', $saloonId),
                $query->expr()->eq('s.deletado', 0),
                $query->expr()->like('s.descricao', sprintf("'%%%s%%'", $serarch))
            )
        );

        $adapter = new DoctrineAdapter(new ORMPaginator($query, false));

        return new Paginator($adapter);
    }

    public function ServicesNotProvidedByProfessional(int $saloonId, int $profissionalId): array
    {
        $query = $this->createQueryBuilder('s');
        $query->leftJoin('s.profissional', 'p');
        $query->where(
            $query->expr()->andX(
                $query->expr()->eq('s.salao', $saloonId),
                $query->expr()->eq('s.deletado', 0),
                $query->expr()->andX(
                    $query->expr()->orX(
                        $query->expr()->isNull('p.id'),
                        $query->expr()->notIn('p.id', $profissionalId)
                    )
                )
            )
        );

        $query = $query->getQuery();
        return $query->execute();

    }

    public function create(Servico $servico, int $saloonId): Servico
    {

        $saloon = $this->getEntityManager()->find(Salao::class, $saloonId);
        $servico->setSalao($saloon);

        $this->getEntityManager()->persist($servico);
        $this->getEntityManager()->flush();

        return $servico;
    }

    public function getBy(int $id): Servico
    {
        /** @var Servico $servico */
        $servico = $this->findOneBy([
            'id' => $id,
            'deletado' => 0
        ]);
        if (is_null($servico)) {
            throw new \InvalidArgumentException(sprintf('Service by id "%s" not found', $id));
        }

        return $servico;
    }

    public function update(Servico $servico): Servico
    {

        $this->getEntityManager()->persist($servico);
        $this->getEntityManager()->flush();
        return $servico;
    }


}