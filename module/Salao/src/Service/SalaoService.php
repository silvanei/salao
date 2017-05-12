<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 04/05/17
 * Time: 21:24
 */

namespace Salao\Service;


use Common\Persistence\TransactionManager;
use Salao\Entity\Salao;
use Salao\Infra\Repository\SalaoRepository;
use Salao\Repository\SalaoRepositoryInterface;

class SalaoService
{

    /** @var  TransactionManager */
    private $transactionManager;

    /** @var  SalaoRepository */
    private $salaoRepository;

    /**
     * SalaoService constructor.
     * @param TransactionManager $transactionManager
     * @param SalaoRepositoryInterface $salaoRepository
     */
    public function __construct(TransactionManager $transactionManager, SalaoRepositoryInterface $salaoRepository)
    {
        $this->transactionManager = $transactionManager;
        $this->salaoRepository = $salaoRepository;
    }


    public function byId($id): Salao
    {
        return $this->salaoRepository->find($id);
    }

    public function update(Salao $salao)
    {
        return $this->salaoRepository->update($salao);
    }
}