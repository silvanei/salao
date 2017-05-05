<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 04/05/17
 * Time: 21:24
 */

namespace Salao\Service;


use Common\Persistence\TransactionManager;
use Salao\Repository\SalaoRepositoryInterface;

class SalaoService
{

    /** @var  TransactionManager */
    private $transactionManager;

    /** @var  SalaoRepositoryInterface */
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


}