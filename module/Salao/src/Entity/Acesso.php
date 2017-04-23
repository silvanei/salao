<?php declare(strict_types=1);

namespace Salao\Entity;

/**
 * Acesso
 */
class Acesso
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
     * Set email
     *
     * @param string $email
     *
     * @return Acesso
     */
    public function setEmail( string $email): Acesso
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set senha
     *
     * @param string $senha
     *
     * @return Acesso
     */
    public function setSenha(string $senha): Acesso
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
     * @return Acesso
     */
    public function setPerfil(string $perfil): Acesso
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
    public function getId(): int
    {
        return $this->id;
    }
}

