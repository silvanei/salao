<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 04/05/17
 * Time: 21:24
 */

namespace Salao\Service;


use Salao\Repository\ServicoRepositoryInterface;

class ServicoService
{

    /** @var  ServicoRepositoryInterface */
    private $servicoRepository;

    /**
     * ServicoService constructor.
     * @param ServicoRepositoryInterface $servicoRepository
     */
    public function __construct(ServicoRepositoryInterface $servicoRepository)
    {
        $this->servicoRepository = $servicoRepository;
    }

    public function findAll()
    {
        return $this->servicoRepository->findAll();
    }
}