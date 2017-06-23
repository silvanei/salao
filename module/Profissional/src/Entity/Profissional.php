<?php declare(strict_types=1);

namespace Profissional\Entity;

use Salao\Entity\Salao;

/**
 * Profissional
 */
class Profissional
{
    /**
     * @var string
     */
    private $nome;

    /**
     * @var string
     */
    private $apelido;

    /**
     * @var string
     */
    private $telefone;

    /**
     * @var string
     */
    private $celular;

    /**
     * @var boolean
     */
    private $deletado = '0';

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Salao\Entity\Salao
     */
    private $salao;


    /**
     * Set nome
     *
     * @param string $nome
     *
     * @return Profissional
     */
    public function setNome(string $nome): Profissional
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * Set apelido
     *
     * @param string $apelido
     *
     * @return Profissional
     */
    public function setApelido(string $apelido): Profissional
    {
        $this->apelido = $apelido;

        return $this;
    }

    /**
     * Get apelido
     *
     * @return string
     */
    public function getApelido(): string
    {
        return $this->apelido;
    }

    /**
     * Set telefone
     *
     * @param string $telefone
     *
     * @return Profissional
     */
    public function setTelefone(string $telefone): Profissional
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
     * @return Profissional
     */
    public function setCelular(string $celular): Profissional
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
     * Set deletado
     *
     * @param boolean $deletado
     *
     * @return Profissional
     */
    public function setDeletado(bool $deletado): Profissional
    {
        $this->deletado = $deletado;

        return $this;
    }

    /**
     * Get deletado
     *
     * @return boolean
     */
    public function getDeletado(): bool
    {
        return $this->deletado;
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

    /**
     * Set salao
     *
     * @param \Salao\Entity\Salao $salao
     *
     * @return Profissional
     */
    public function setSalao(Salao $salao = null)
    {
        $this->salao = $salao;

        return $this;
    }

    /**
     * Get salao
     *
     * @return \Salao\Entity\Salao
     */
    public function getSalao():? Salao
    {
        return $this->salao;
    }
}

