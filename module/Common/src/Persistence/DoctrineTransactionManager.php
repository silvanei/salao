<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 24/04/17
 * Time: 19:39
 */

namespace Common\Persistence;


use Doctrine\ORM\EntityManager;

class DoctrineTransactionManager implements TransactionManager
{

    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @param EntityManager $anEntityManager
     */
    public function __construct(EntityManager $anEntityManager)
    {
        $this->entityManager = $anEntityManager;
    }

    /**
     * @return void
     */
    public function beginTransaction(): void
    {
        $this->entityManager->beginTransaction();
    }

    /**
     * @return void
     */
    public function commit(): void
    {
        $this->entityManager->commit();
    }

    /**
     * @return void
     */
    public function rollback(): void
    {
        $this->entityManager->rollback();
    }
}