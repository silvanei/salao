<?php

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
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string
     */
    public function getNome()
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
    public function setApelido($apelido)
    {
        $this->apelido = $apelido;

        return $this;
    }

    /**
     * Get apelido
     *
     * @return string
     */
    public function getApelido()
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
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }

    /**
     * Get telefone
     *
     * @return string
     */
    public function getTelefone()
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
    public function setCelular($celular)
    {
        $this->celular = $celular;

        return $this;
    }

    /**
     * Get celular
     *
     * @return string
     */
    public function getCelular()
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
    public function setDeletado($deletado)
    {
        $this->deletado = $deletado;

        return $this;
    }

    /**
     * Get deletado
     *
     * @return boolean
     */
    public function getDeletado()
    {
        return $this->deletado;
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
    public function getSalao()
    {
        return $this->salao;
    }
}

