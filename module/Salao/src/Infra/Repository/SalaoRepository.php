<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 22/04/17
 * Time: 20:58
 */

namespace Salao\Infra\Repository;

use Doctrine\ORM\EntityRepository;
use Salao\Entity\HorarioFuncionamento;
use Salao\Entity\Salao;
use Salao\Repository\SalaoRepositoryInterface;

class SalaoRepository extends EntityRepository  implements SalaoRepositoryInterface
{

    public function add(Salao $salao): Salao
    {

        $horario = new HorarioFuncionamento();
        $horario->setHoraInicio(new \DateTime('08:00:00'));
        $horario->setHoraFim(new \DateTime('20:00:00'));
        $horario->setDomingo(false);
        $horario->setSegunda(false);
        $horario->setTerca(false);
        $horario->setQuarta(false);
        $horario->setQuinta(false);
        $horario->setSexta(false);
        $horario->setSabado(false);

        $this->getEntityManager()->persist($salao);
        $horario->setSalao($salao);
        $this->getEntityManager()->persist($horario);
        $this->getEntityManager()->flush();

        return $salao;
    }

    public function update(Salao $salao): Salao
    {
        $this->getEntityManager()->persist($salao);
        $this->getEntityManager()->flush();

        return $salao;
    }
}