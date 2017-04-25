<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 22/04/17
 * Time: 20:58
 */

namespace Salao\Infra\Repository;

use Doctrine\ORM\EntityManager;
use Salao\Entity\Profissional;
use Salao\Repository\ProfissionalRepositoryInterface;

class ProfissionalRepository implements ProfissionalRepositoryInterface
{

    /** @var  EntityManager */
    private $em;

    /**
     * SalaoRepository constructor.
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function add(Profissional $profissional): Profissional
    {
        $this->em->persist($profissional);
        $this->em->flush();

        return $profissional;
    }


}