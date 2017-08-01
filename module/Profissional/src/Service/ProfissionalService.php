<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 23/06/2017
 * Time: 12:44
 */

namespace Profissional\Service;


use Profissional\Entity\Profissional;
use Profissional\Repository\ProfissionalRepositoryInterface;
use Salao\Entity\Identity;
use Salao\Repository\ServicoRepositoryInterface;
use Zend\Paginator\Paginator;

class ProfissionalService
{

    /** @var  ProfissionalRepositoryInterface */
    private $profissionalRepository;

    /** @var  ServicoRepositoryInterface */
    private $servicoRepository;

    /** @var  Identity */
    protected $identity;

    /**
     * ProfissionalService constructor.
     * @param ProfissionalRepositoryInterface $profissionalRepository
     * @param ServicoRepositoryInterface $servicoRepository
     * @param Identity|null $identity
     */
    public function __construct(
        ProfissionalRepositoryInterface $profissionalRepository,
        ServicoRepositoryInterface $servicoRepository,
        Identity $identity = null
    ) {
        $this->profissionalRepository = $profissionalRepository;
        $this->servicoRepository = $servicoRepository;
        $this->identity = $identity;
    }

    public function findAll(string $serarch): Paginator
    {
        $saloonId = $this->identity->getSalaoId();

        return $this->profissionalRepository->findBySaloonId($saloonId, $serarch);
    }

    public function create(Profissional $profissional): Profissional
    {

        $saloonId = $this->identity->getSalaoId();

        return $this->profissionalRepository->criar($profissional, $saloonId);
    }

    public function getBy(int $id): Profissional
    {

        $saloonId = $this->identity->getSalaoId();

        return $this->profissionalRepository->getBy($id, $saloonId);
    }

    public function update(Profissional $profissional): Profissional
    {

        return $this->profissionalRepository->update($profissional);
    }

    public function delete(Profissional $profissional): bool {

        $profissional->setDeletado(true);
        $this->profissionalRepository->update($profissional);
        return true;
    }

    public function servicesNotProvided($profissionalId): array
    {
        $saloonId = $this->identity->getSalaoId();

        return $this->servicoRepository->ServicesNotProvidedByProfessional($saloonId, $profissionalId);
    }
}