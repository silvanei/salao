<?php declare(strict_types=1);

namespace Salao\Entity;

/**
 * AcessoProfissional
 */
class Identity
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $perfil;

    /**
     * @var integer
     */
    private $profissional_id;

    /**
     * @var integer
     */
    private $salao_id;

    /**
     * Identity constructor.
     * @param int $id
     * @param string $email
     * @param string $perfil
     * @param int $profissional_id
     * @param int $salao_id
     */
    public function __construct($id, $email, $perfil, $profissional_id, $salao_id)
    {
        $this->id = $id;
        $this->email = $email;
        $this->perfil = $perfil;
        $this->profissional_id = $profissional_id;
        $this->salao_id = $salao_id;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPerfil(): string
    {
        return $this->perfil;
    }

    /**
     * @return int
     */
    public function getProfissionalId(): int
    {
        return $this->profissional_id;
    }

    /**
     * @return int
     */
    public function getSalaoId(): int
    {
        return $this->salao_id;
    }
}

