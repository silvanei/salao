<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 04/05/17
 * Time: 21:24
 */

namespace Salao\Service;


use Salao\Entity\Identity;
use Salao\Repository\ServicoRepositoryInterface;

class ServicoService
{

    /** @var  ServicoRepositoryInterface */
    private $servicoRepository;

    /** @var  Identity */
    protected $identity;

    /**
     * ServicoService constructor.
     * @param ServicoRepositoryInterface $servicoRepository
     * @param Identity $identity
     */
    public function __construct(ServicoRepositoryInterface $servicoRepository, Identity $identity)
    {
        $this->servicoRepository = $servicoRepository;
        $this->identity = $identity;
    }


    public function findAll()
    {
        $salaoId = $this->identity->getSalaoId();

        return $this->servicoRepository->findBySaloonId($salaoId);
    }
}