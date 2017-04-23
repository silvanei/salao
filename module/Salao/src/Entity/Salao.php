<?php declare(strict_types=1);

namespace Salao\Entity;

/**
 * Salao
 */
class Salao
{
    /**
     * @var string
     */
    private $nome;

    /**
     * @var boolean
     */
    private $visivelNoApp = false;

    /**
     * @var string
     */
    private $telefone;

    /**
     * @var string
     */
    private $celular;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set nome
     *
     * @param string $nome
     *
     * @return Salao
     */
    public function setNome(string $nome): Salao
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string
     */
    public function getNome() : string
    {
        return $this->nome;
    }

    /**
     * Set visivelNoApp
     *
     * @param boolean $visivelNoApp
     *
     * @return Salao
     */
    public function setVisivelNoApp(bool $visivelNoApp): Salao
    {
        $this->visivelNoApp = $visivelNoApp;

        return $this;
    }

    /**
     * Get visivelNoApp
     *
     * @return boolean
     */
    public function getVisivelNoApp(): bool
    {
        return $this->visivelNoApp;
    }

    /**
     * Set telefone
     *
     * @param string $telefone
     *
     * @return Salao
     */
    public function setTelefone(string $telefone): Salao
    {
        $this->telefone = $telefone;

        return $this;
    }

    /**
     * Get telefone
     *
     * @return string
     */
    public function getTelefone(): string
    {
        return $this->telefone;
    }

    /**
     * Set celular
     *
     * @param string $celular
     *
     * @return Salao
     */
    public function setCelular(string $celular): Salao
    {
        $this->celular = $celular;

        return $this;
    }

    /**
     * Get celular
     *
     * @return string
     */
    public function getCelular(): string
    {
        return $this->celular;
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

