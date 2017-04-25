<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 22/04/17
 * Time: 20:58
 */

namespace Salao\Infra\Repository;

use Doctrine\ORM\EntityManager;
use Salao\Entity\Salao;
use Salao\Repository\SalaoRepositoryInterface;

class SalaoRepository implements SalaoRepositoryInterface
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

    public function add(Salao $salao): Salao
    {
        $this->em->persist($salao);
        $this->em->flush();

        return $salao;
    }


}