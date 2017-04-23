<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 22/04/17
 * Time: 20:03
 */

namespace Site\Infra\Service;

use Salao\Repository\AcessoRepository;
use Salao\Repository\ProfissionalRepository;
use Salao\Repository\SalaoRepository;
use Site\Service\CadastroService as CadastroServiceInterface;

class CadastroService implements CadastroServiceInterface
{

    private $salaoRepository;
    private $profissionalRepository;
    private $acessoRepository;

    public function __construct(
        SalaoRepository $salaoRepository,
        ProfissionalRepository $profissionalRepository,
        AcessoRepository $acessoRepository
    ) {
        $this->salaoRepository = $salaoRepository;
        $this->profissionalRepository = $profissionalRepository;
        $this->acessoRepository = $acessoRepository;
    }


}