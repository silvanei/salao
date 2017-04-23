<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 22/04/17
 * Time: 19:53
 */

namespace Site\Service;


use Salao\Repository\AcessoRepository;
use Salao\Repository\ProfissionalRepository;
use Salao\Repository\SalaoRepository;

interface CadastroService
{

    public function __construct(
        SalaoRepository $salaoRepository,
        ProfissionalRepository $profissionalRepository,
        AcessoRepository $acessoRepository
    );
}