<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 04/05/17
 * Time: 21:24
 */

namespace Salao\Service;


use Salao\Entity\Identity;
use Salao\Entity\Salao;
use Salao\Entity\Servico;
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
        $saloonId = $this->identity->getSalaoId();

        return $this->servicoRepository->findBySaloonId($saloonId);
    }

    public function create(Servico $servico)
    {
        $saloonId = $this->identity->getSalaoId();

        return $this->servicoRepository->create($servico, $saloonId);
    }

    public function getBy(int $id): Servico {

        return $this->servicoRepository->getBy($id);
    }

    public function update(Servico $servico): Servico {

        return $this->servicoRepository->update($servico);
    }
}