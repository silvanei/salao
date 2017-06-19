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

class ServicoRepository extends EntityRepository implements ServicoRepositoryInterface
{

    public function findBySaloonId(int $saloonId): array
    {
        $servicos = $this->findBy([
            'salao' => $saloonId,
            'deletado' => 0
        ]);

        return $servicos;
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
        $servico = $this->find($id);
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