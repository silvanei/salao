<?php declare(strict_types=1);

namespace Salao\Entity;

use Profissional\Entity\Profissional;

/**
 * AcessoProfissional
 */
class AcessoProfissional
{
    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $senha;

    /**
     * @var string
     */
    private $perfil;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var Profissional
     */
    private $profissional;


    /**
     * Set email
     *
     * @param string $email
     *
     * @return AcessoProfissional
     */
    public function setEmail($email) : AcessoProfissional
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail() : string
    {
        return $this->email;
    }

    /**
     * Set senha
     *
     * @param string $senha
     *
     * @return AcessoProfissional
     */
    public function setSenha($senha): AcessoProfissional
    {
        $this->senha = $senha;

        return $this;
    }

    /**
     * Get senha
     *
     * @return string
     */
    public function getSenha(): string
    {
        return $this->senha;
    }

    /**
     * Set perfil
     *
     * @param string $perfil
     *
     * @return AcessoProfissional
     */
    public function setPerfil($perfil): AcessoProfissional
    {
        $this->perfil = $perfil;

        return $this;
    }

    /**
     * Get perfil
     *
     * @return string
     */
    public function getPerfil(): string
    {
        return $this->perfil;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set profissional
     *
     * @param Profissional $profissional
     *
     * @return AcessoProfissional
     */
    public function setProfissional(Profissional $profissional = null)
    {
        $this->profissional = $profissional;

        return $this;
    }

    /**
     * Get profissional
     *
     * @return Profissional
     */
    public function getProfissional()
    {
        return $this->profissional;
    }
}

