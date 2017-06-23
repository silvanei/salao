<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 22/04/17
 * Time: 20:03
 */

namespace Site\Service;

use Common\Persistence\TransactionManager;
use Salao\Entity\AcessoProfissional;
use Salao\Entity\Salao;
use Salao\Repository\AcessoRepositoryInterface;
use Salao\Repository\ProfissionalRepositoryInterface;
use Salao\Repository\SalaoRepositoryInterface;

class CadastroService
{

    private $transactionManager;
    private $salaoRepository;
    private $profissionalRepository;
    private $acessoRepository;

    public function __construct(
        TransactionManager $transactionManager,
        SalaoRepositoryInterface $salaoRepository,
        ProfissionalRepositoryInterface $profissionalRepository,
        AcessoRepositoryInterface $acessoRepository
    ) {
        $this->transactionManager = $transactionManager;
        $this->salaoRepository = $salaoRepository;
        $this->profissionalRepository = $profissionalRepository;
        $this->acessoRepository = $acessoRepository;
    }

    public function cadastrarSalao(Salao $salao, AcessoProfissional $acessoProfissional)
    {

        try {

            $this->transactionManager->beginTransaction();

            $salao = $this->salaoRepository->add($salao);

            $profissional = $acessoProfissional
                ->getProfissional()
                ->setSalao($salao)
            ;
            $this->profissionalRepository->add($profissional);

            $this->acessoRepository->add($acessoProfissional);

            $this->transactionManager->commit();
        } catch (\Exception $exception) {
            $this->transactionManager->rollback();

            die($exception->getMessage());
        }

    }


}